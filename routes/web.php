<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// HomeController created from Auth Orders 
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'TagsController');
    //Show trashed Posts    
    Route::get('/posts/trashed/show', 'PostsController@trashed')->name('posts.trashed'); 
    Route::get('/posts-restore/{id}', 'PostsController@restore')->name('posts.restore');
});

Route::middleware(['auth' ,'admin'])->group(function () {
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::post('/users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('/users/{user}/remove-admin', 'UsersController@removeAdmin')->name('users.remove-admin');

});

Route::middleware(['auth'])->group(function(){
    Route::get('/users/{user}/edit-profile', 'UsersController@editProfile')->name('users.editProfile');
    Route::post('/users/{user}/update-profile', 'UsersController@updateProfile')->name('users.updateProfile');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

// Front end routes 

Route::get('/', 'WelcomeController@index');
Route::get('post/{post}', 'WelcomeController@postShow')->name('front.post.show');

