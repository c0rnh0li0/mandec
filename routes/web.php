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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('main');
});

Route::get('elfinder/connector', '\Barryvdh\Elfinder\ElfinderController@showConnector');
Route::post('elfinder/connector', '\Barryvdh\Elfinder\ElfinderController@showConnector');
Route::get('elfinder', '\Barryvdh\Elfinder\ElfinderController@showPopup');
Route::get('admin/elfinder', '\Barryvdh\Elfinder\ElfinderController@showPopup');

Route::group(['prefix' => 'frontend', 'middleware' => ['web', 'adminAjax'], 'namespace' => 'Frontend'], function () {
    //dd("dies here");
    Route::resource('pagesectionwidget', 'PageSectionWidgetController');
    //Route::any('pagesectionwidget', 'PageSectionWidgetController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('widget', 'WidgetCrudController');
    CRUD::resource('widget_type', 'WidgetTypeCrudController');
    CRUD::resource('template_section', 'TemplateSectionCrudController');
    CRUD::resource('template', 'TemplateCrudController');
    CRUD::resource('page-category', 'PageCategoryCrudController');
    CRUD::resource('page', 'ExtendedPageCrudController');
    CRUD::resource('controller-permission', 'ControllerPermissionCrudController');
    CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
});

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page?}/{subs?}', ['uses' => 'PageController@index'])->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);