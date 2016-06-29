<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\BootstrapThreePresenter;

class CategoryController extends CommonController
{

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::getCatInfoModelByAsName($id);
        if (empty($category)) {
            return redirect(url(route('article.index')));
        }
        $articleList = Article::getArticleListByCatId($category->id, 10);
        $page = new BootstrapThreePresenter($articleList['page']);
        return homeView('category', [
            'category' => $category,
            'articleList' => $articleList,
            'page' => $page
        ]);
    }

}
