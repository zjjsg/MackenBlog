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

        $userInfo = User::getUserInfoModelByUserId(1);
        if(empty($userInfo)){
            return redirect('/');
        }
        $userArticle = Article::getArticleModelByUserId(1);
        return view('themes.default.about', compact('userInfo', 'userArticle'));
	}

}
