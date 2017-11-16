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

Route::group(['prefix' => 'admin', 'middleware' => ['adminAjax', 'web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('pagesectionwidget', 'PageSectionWidgetCrudController');

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