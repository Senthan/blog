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



$router->group(['middleware' => ['auth']], function ($router) {


    // users 
    $router->get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
    $router->get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
    $router->post('user', ['as' => 'user.store', 'uses' => 'UserController@store']);

    $router->get('user/{user}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    $router->patch('user/{user}', ['as' => 'user.update', 'uses' => 'UserController@update']);

    $router->get('user/{user}/delete', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
    $router->delete('user/{user}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);



    // Roles
    $router->get('role/sync', ['as' => 'role.sync', 'uses' => 'RoleController@sync']);
    $router->get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);
    $router->get('role/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
    $router->post('role', ['as' => 'role.store', 'uses' => 'RoleController@store']);

    $router->get('role/{role}/edit', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);
    $router->patch('role/{role}', ['as' => 'role.update', 'uses' => 'RoleController@update']);

    $router->get('role/{role}/delete', ['as' => 'role.delete', 'uses' => 'RoleController@delete']);
    $router->delete('role/{role}', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);

    $router->get('role/{role}/policy/{policy?}', ['as' => 'role.show', 'uses' => 'RoleController@show']);

    $router->patch('role/{role}/{policy}/method', ['as' => 'role.update.method', 'uses' => 'RoleController@updateMethod']);

    $router->get('role/{role}/policy/permission', ['as' => 'role.permission', 'uses' => 'RoleController@permission']);
    $router->get('role/{role}/policy/{policy}/permission', ['as' => 'role.get.permission', 'uses' => 'RoleController@getPolicyMethods']);



    $router->get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@index']);
    $router->get('blog/create', ['as' => 'blog.create', 'uses' => 'BlogController@create']);
    $router->post('blog', ['as' => 'blog.store', 'uses' => 'BlogController@store']);

    $router->get('blog/{blog}/edit', ['as' => 'blog.edit', 'uses' => 'BlogController@edit']);
    $router->patch('blog/{blog}', ['as' => 'blog.update', 'uses' => 'BlogController@update']);

    $router->get('blog/{blog}/delete', ['as' => 'blog.delete', 'uses' => 'BlogController@delete']);
    $router->delete('blog/{blog}', ['as' => 'blog.destroy', 'uses' => 'BlogController@destroy']);


    $router->get('blog/{blog}/delete', ['uses' => 'BlogController@delete', 'as' => 'blog.delete']);

    $router->post('blog/category', ['uses' => 'BlogCategoryController@store', 'as' => 'category.store']);
    $router->get('blog/category/create', ['uses' => 'BlogCategoryController@create', 'as' => 'category.create']);


});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/demo', 'HomeController@demo');

    $router->post('comments/add/{model}', ['uses' => 'CommentController@addComment', 'as' => 'comments.add']);
    $router->post('comments/remove', ['uses' => 'CommentController@removeComment', 'as' => 'comments.remove']);
    $router->get('comments/{model}', ['uses' => 'CommentController@view', 'as' => 'comments.get']);


    $router->get('blog/{blog}', ['as' => 'blog.show', 'uses' => 'HomeController@show']);