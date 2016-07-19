<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| use Route::pattern() use to establish the pattern of a parameter in the example route: Route::pattern('id', '[0-9]+') establish It stipulates that the ID is an integer at least one digit
| every use ask name for route beacuse the route name is change but ask name note
| example Route::get('/ex', ['as' => 'example', Controller]); this route every response for ask name example
| know actual route use Route::CurrentRouteName();
*/
// for use request type put add in form filde hidden with name _method and value PUT
// route pattern to validate all routes comming with id paramters to numeric parameter
Route::pattern('id', '[0-9]+');

get('/', 'UserController@index');
get('admin/category', 'AdminCategoriesController@index');
get('admin/products', 'AdminProductsController@index');

Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'products'], function () {
        get('/{product?}', 'AdminProductsController@index');
        post('/', 'AdminProductsController@store');
        put('/', 'AdminProductsController@update');
        delete('/', 'AdminProductsController@destroy');
    });

    Route::group(['prefix' => 'category'], function () {
        get('/{category?}', 'AdminCategoriesController@index');
        post('/', 'AdminCategoriesControlle@store');
        put('/', 'AdminCategoriesControlle@update');
        delete('/', 'AdminCategoriesControlle@destroy');
    });
});

Route::group(['prefix' => 'categories'], function () {
    get('', ['as' =>'categories', 'uses' => 'CategoriesController@index']);
    get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    get('/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    get('/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    put('/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
});