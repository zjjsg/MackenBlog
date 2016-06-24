<?php namespace App\Http\Controllers;

use App\Components\EndaPage;
use App\Http\Controllers\Controller;

use App\Model\ArticleStatus;
use App\Model\Article;

class ArticleController extends CommonController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $article = Article::getNewsArticle(8);
        $page = new EndaPage($article['page']);
        return homeView('index', array(
            'articleList' => $article,
            'page' => $page
        ));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::getArticleModelByArticleId($id);

        ArticleStatus::updateViewNumber($id);
        $data = array(
            'article' => $article,
        );
        return homeView('article', $data);
    }

}
