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
// for use request type put add in form filde hidden with name _method and value PUT
// route pattern to validate all routes comming with id paramters to numeric parameter
Route::pattern('id', '[0-9]+');

get("/", "UserController@index");
get("/category", "AdminCategoriesController@index");
get("/products", "AdminProductsController@index");

Route::get("/products", ['as' => 'produtos', function() {
    return "rotamaluca";
}]);