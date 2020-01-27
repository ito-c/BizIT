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

Auth::routes();

Route::view('/home2', 'home2')->name('home2');

Route::view('/', 'welcome');

Route::group(['middleware' => 'auth'], function() {
    // ホーム等の非管理関連エリア
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post/{id}', 'PostController@show')->name('post');
    Route::resource('/comment', 'CommentController')->only(['store','destroy']);
    Route::get('/user/{id}', 'UserController@show')->name('user');
    Route::get('/category/{id}', 'CategoryController@index')->name('category');

    // like,unlike
    Route::prefix('post/{id}')->group(function() {
        Route::post('like', 'LikeController@store')->name('likes.like');
        Route::delete('unlike', 'LikeController@destroy')->name('likes.unlike');
    });

    // 管理画面関連
    Route::prefix('admin')->group(function() {
        Route::view('/', 'admin.index')->name('admin');
        // 自分の投稿関連
        Route::resource('/post', 'AdminPostController')->only(['index','create','store','edit','update','destroy']);
        Route::resource('/post/removed', 'AdminRemovedPostController')->only(['index','edit']);
        Route::post('/post/removed/{id}/forcedelete', 'AdminRemovedPostController@forceDelete')->name('forceDelete');
        // like一覧
        Route::get('/like', 'AdminLikeController@index')->name('adminLike');
        // profile編集
        Route::resource('/profile', 'AdminProfileController')->only(['index','edit','update']);
        // カテゴリー申請
        Route::resource('/category_request', 'AdminCategoryRequestController')->only(['create','store']);
    });
});

Route::group(['middleware' => ['auth','master']], function() {
    // サイト管理者関連(masterミドルウェア)
    // 投稿管理
    Route::resource('/master/post', 'MasterPostController',[
        'names' => [
            'index' => 'master_post.index',
            'destroy' => 'master_post.destroy'
            ]])
            ->only(['index','destroy']
        );

    // ユーザー管理
    Route::resource('/master/user', 'MasterUserController',[
        'names' => [
            'index' => 'master_user.index',
            'destroy' => 'master_user.destroy'
            ]])
            ->only(['index','destroy']
        );
    
    // カテゴリー申請関連
    Route::resource('/master/category_request', 'MasterCategoryRequestController',[
        'names' => [
            'index' => 'master_category_request.index',
            'store' => 'master_category_request.store',
            'show' => 'master_category_request.show',
            'destroy' => 'master_category_request.destroy'
            ]])
            ->only(['index','store','show','destroy']
        );
});