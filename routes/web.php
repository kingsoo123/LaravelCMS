<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoriesController');
Route::resource('tags', 'TagsController');
Route::resource('posts', 'PostsController');
Route::get('/trashed', 'PostsController@trashed')->name('trashed.post');
Route::put('restore-posts/{post}', 'PostsController@restore')->name('restore-post');



Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::post('/users/{userId}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});















































/* 
Route::get('/index', 'TodosController@index');
Route::get('/index/todo/delete/{todoId}', 'TodosController@delete');
Route::post('/create/todo', 'TodosController@store');
Route::post('/save/todo/{todoId}', 'TodosController@save');
Route::get('/completed/todo/{todoId}', 'TodosController@completed')->name('todo.completed');
Route::get('todo/update/{id}', 'TodosController@update')->name('todo.update'); */

















































/* Route::get('todos', 'TodosController@index');

Route::get('todos/{todo}', 'TodosController@show');

Route::get('new-todo', 'TodosController@create');

Route::post('store-todo', 'TodosController@store');

Route::get('todos/{todoId}/edit', 'TodosController@edit');
Route::post('todo/{todoId}/update-todo', 'TodosController@update');
Route::get('todos/{todoId}/delete', 'TodosController@delete'); */














/* 
Route::get('/pizzas', 'PizzaController@index');

Route::get('pizzas/create', 'PizzaController@create');
Route::POST('pizzas', 'PizzaController@store');
Route::get('pizzas/{id}', 'PizzaController@show');
Route::delete('pizzas/{id}', 'PizzaController@destroy'); */
