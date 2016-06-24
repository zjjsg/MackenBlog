<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Article;
use App\User;
use Illuminate\Http\Request;

class AboutController extends CommonController {


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//

        $userInfo = User::getUserInfoModelByUserId($id);
        if(empty($userInfo)){
            return redirect('/');
        }
        $userArticle = Article::getArticleModelByUserId($id);
        return homeView('about',[
            'userInfo'=>$userInfo,
            'userArticle'=>$userArticle
        ]);
	}

}
