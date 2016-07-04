<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ArticleController@index');
Route::get('archive/{year}/{month}', ['as' => 'article-archive-list', 'uses' => 'ArticleController@archive']);
Route::get('about', 'AboutController@show');

Route::resource('article', 'ArticleController');
// Route::resource('comment', 'CommentController');
Route::resource('category', 'CategoryController');

Route::controllers([
    'backend/auth' => 'Backend\AuthController',
    'backend/password' => 'Backend\PasswordController',
    'search'=>'SearchController',
]);

Route::group(['prefix'=>'backend','middleware'=>'auth'],function(){
    Route::any('/','Backend\HomeController@index');
    Route::resource('home', 'Backend\HomeController');
    Route::resource('cate','Backend\CateController');
    Route::resource('content','Backend\ContentController');
    Route::resource('article','Backend\ArticleController');
    Route::resource('tags','Backend\TagsController');
    Route::resource('user','Backend\UserController');
    // Route::resource('comment','Backend\CommentController');
    Route::resource('nav','Backend\NavigationController');
    Route::resource('links','Backend\LinksController');
    Route::resource('upload', 'Backend\UploadController', ['only' => 'store']);
    Route::controllers([
        'system'=>'Backend\SystemController',
    ]);

});
