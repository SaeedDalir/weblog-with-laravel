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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin'], function (){
    Route::resource('admin/users','Admin\AdminUserController');
    Route::resource('admin/posts','Admin\AdminPostController');
    Route::delete('admin/delete/post','Admin\AdminPostController@deleteAll')->name('post.delete.all');

    Route::resource('admin/categories','Admin\AdminCategoryController');
    Route::resource('admin/photos','Admin\AdminPhotoController');
    Route::delete('admin/delete/media','Admin\AdminPhotoController@deleteAll')->name('photo.delete.all');
    Route::get('admin/dashboard','Admin\DashboardController@index')->name('dashboard.index');
    Route::resource('admin/comments','Admin\CommentController');
    Route::delete('admin/delete/comment','Admin\CommentController@deleteAll')->name('comment.delete.all');
    Route::post('admin/actions/{id}','Admin\CommentController@actions')->name('comments.actions');
    Route::get('admin/messages','Admin\AdminMessageController@index')->name('messages.index');
    Route::delete('admin/delete/message','Admin\AdminMessageController@deleteAll')->name('message.delete.all');
});
Route::group(['middleware'=>'writer'], function (){
});


Route::get('/','Frontend\MainController@index');
Route::get('/posts/{slug}','Frontend\PostController@show')->name('frontend.posts.show');
Route::get('/search','Frontend\PostController@searchTitle')->name('frontend.posts.search');
Route::post('/comments/{postId}','Frontend\CommentController@store')->name('frontend.comments.store');
Route::post('/comments','Frontend\CommentController@reply')->name('frontend.comments.reply');
Route::get('/categories/{slug}/posts','Frontend\PostController@categoryPosts')->name('frontend.categories.categoryPosts');
Route::get('/contact','Frontend\MainController@contactForm')->name('frontend.contact.contactForm');
Route::post('/contact/messages','Frontend\MainController@storeMessage')->name('frontend.contact.storeMessage');

