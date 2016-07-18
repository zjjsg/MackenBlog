<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;

class AboutController extends Controller {


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $article = Article::getArticleModel('about');
        ArticleStatus::updateViewNumber($article->id);
        return view('pages.show', compact('article'));
	}

}
