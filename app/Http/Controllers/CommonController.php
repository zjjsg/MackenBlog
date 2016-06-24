<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct() {
        $article = app('App\Model\Article');
        $tags = app('App\Model\Tag');
        $nav = app('App\Model\Navigation');
        $links = app('App\Model\Links');
        $view = app('Illuminate\Contracts\View\Factory');

        $view->share('hotArticleList', $article::getHotArticle(3));
        $view->share('tagList', $tags::getHotTags(12));
        $view->share('navList', $nav::getNavigationAll());
        $view->share('linkList', $links::getLinkList());
    }

}
