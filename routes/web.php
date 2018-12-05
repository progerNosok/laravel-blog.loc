<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'HomeController@tagShow')->name('tag.show');
Route::get('/category/{slug}', 'HomeController@categoryShow')->name('category.show');

Route::get('/confirm/{token}', 'Auth\RegisterController@confirm')->name('confirm.password');

Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
Route::get('/subscribe/confirm/{token}', 'SubscribeController@subConfirm')->name('sub.confirm');


Route::group(['middleware' => 'guest'], function(){
    Route::get('/account/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/account/register', 'Auth\RegisterController@register');

    Route::get('/account/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/account/login', 'Auth\LoginController@login');

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'confirmAndNotBan'], function() {

    Route::get('/account/about-user', 'UserController@showFormAboutUser');
    Route::post('/account/about-user', 'UserController@saveAboutUser');

    Route::post('/comment/add', 'CommentsController@store')->name('comment.add');

    Route::get('user/full-info', 'UserController@showFormUserFullInfo')->name('user.full-info');
    Route::post('user/full-info', 'UserController@saveUserFullInfo');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.index');
    Route::resource('/categories', 'Admin\CategoriesController');
    Route::resource('/tags', 'Admin\TagsController');
    Route::resource('/posts', 'Admin\PostsController');

    //comments
    Route::get('/comments', 'Admin\CommentsController@show')->name('comments.show');
    Route::get('/comment/allow/{id}', 'Admin\CommentsController@allow')->where('id', '[0-9]+')->name('comment.allow');
    Route::get('/comment/disallow/{id}', 'Admin\CommentsController@disallow')->where('id', '[0-9]+')->name('comment.disallow');
    Route::delete('/comment/destroy/{id}', 'Admin\CommentsController@destroy')->where('id', '[0-9]+')->name('comment.delete');

    //user
    Route::get('/users', 'Admin\UsersController@index')->name('users.index');
    Route::post('/users/ban/{id}', 'Admin\UsersController@ban')->name('users.ban');
    Route::post('/users/unban/{id}', 'Admin\UsersController@unban')->name('users.unban');
    Route::get('/users/info/{id}', 'Admin\UsersController@moreInfo')->name('users.info');
    Route::delete('/users/delete/{id}', 'Admin\UsersController@destroy')->name('users.delete');

    //subscribers
    Route::get('/subscribers', 'Admin\SubscribersController@index')->name('subscribers.index');
    Route::get('/subscribers/add', 'Admin\SubscribersController@showAddForm')->name('subscribers.add');
    Route::post('/subscribers/add', 'Admin\SubscribersController@add');
    Route::delete('/subscribers/delete/{id}', 'Admin\SubscribersController@destroy')->name('subscribers.delete');

});
