<?php namespace App\Http\Controllers;

use Illuminate\Pagination\BootstrapThreePresenter;
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
        $articleList = Article::getNewsArticle(8);
        $page = new BootstrapThreePresenter($articleList['page']);
        return homeView('index', compact('articleList', 'page'));
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
        return homeView('article', ['article' => $article]);
    }

    /**
     * display the archived articles by month
     * @param  [type] $year  [description]
     * @param  [type] $month [description]
     * @return [type]        [description]
     */
    public function archive($year, $month)
    {
        $archiveTitle = '归档：'.$year.'年 '.$month.'月';
        $articleList = Article::getArchivedArticleList($year, $month, 8);
        $page = new BootstrapThreePresenter($articleList['page']);
        return homeView('archive', compact('articleList', 'page', 'archiveTitle'));
    }

}
