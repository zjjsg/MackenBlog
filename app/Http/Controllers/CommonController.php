<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        view()->share('hotArticleList', \App\Model\Article::getHotArticle(5));
        view()->share('tagList', \App\Model\Tag::getHotTags(12));
        view()->share('navList', \App\Model\Navigation::getNavigationAll());
        view()->share('archiveList', \App\Model\Article::getArchiveList(12));
        view()->share('linkList', \App\Model\Links::getLinkList());
    }

}
