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

Route::get('/', function () {
    return view('welcome');
});

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {

    CRUD::resource('widget', 'WidgetCrudController');
    CRUD::resource('template_section', 'TemplateSectionCrudController');
    CRUD::resource('template', 'TemplateCrudController');
    CRUD::resource('page-category', 'PageCategoryCrudController');
    CRUD::resource('page', 'ExtendedPageCrudController');
    //CRUD::resource('tag', 'TagCrudController');
});