<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input, Notification, Auth, Request, Cache;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleStatus;
use App\Http\Requests\ArticleRequest;
use App\Models\Tag;

class ArticleController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('backend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categoryTree = Category::getCategoryTree();
        $categoryTree[0] = '单页';
        $tags = Tag::lists('name', 'id');
        return view('backend.article.create', compact('categoryTree', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        try {

            $pic = upload_file('pic', $request);
            !$pic && Notification::error('文章配图上传失败');

            $request->pic = $pic;
            $article = Auth::user()->articles()->create($request->all());

            if ($request->has('tag_list')) {
                $this->syncTags($article, $request->input('tag_list'));
            }

            if (ArticleStatus::initArticleStatus($article->id)) {
                Notification::success('文章发表成功');
                return redirect()->route('backend.article.index');
            } else {
                self::destroy($article->id);
            }

            return $article;
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Article::select('content')->find($id)->content;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');
        $categoryTree = Category::getCategoryTree();
        $categoryTree[0] = '单页';
        return view('backend.article.edit', compact('article', 'categoryTree', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        try {

            if (Request::hasFile('pic')) {
                $pic = upload_file('pic', $request);
                !$pic && Notification::error('文章配图上传失败');
                $request->pic = $pic;
            }

            if ($article->update($request->all())) {
                $this->syncTags($article, $request->input('tag_list'));
                Notification::success('更新成功');

                return redirect()->route('backend.article.index');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        if (!empty($article->pic)) {
            $fileName = public_path() . '/uploads/' . $article->pic;
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }

        if (ArticleStatus::deleteArticleStatus($id)) {

            if (Article::destroy($id)) {
                Notification::success('删除成功');
    
            } else {
                Notification::error('主数据删除失败');
            }

        } else {
            Notification::error('动态删除失败');
        }

        return redirect()->route('backend.article.index');
    }

    private function syncTags(Article $article, array $tags) 
    {
        #extract the input into separate numeric and string arrays
        $currentTags = array_filter($tags, 'is_numeric'); # ["1", "3", "5"]
        $newTags = array_diff($tags, $currentTags); # ["awesome", "cool"]

        #Create a new tag for each string in the input and update the current tags array
        foreach ($newTags as $newTag)
        {
          if ($tag = Tag::firstOrCreate(['name' => $newTag]))
            $currentTags[] = $tag->id;
        }

        $article->tags()->sync($currentTags); 
    }

}
