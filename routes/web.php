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

Route::get('/', function (){
    return view('common.app');
});


Route::get('/application', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@dashboard');

// Templates 
Route::group(array('prefix'=>'/templates/'),function(){
    Route::get('{template}', array( function($template)
    {
        $template = str_replace(".html","",$template);
        View::addExtension('html','php');
        return View::make('templates.'.$template);
    }));
});

Route::get('menuInfo', 'DashboardController@menuManage');
Route::get('menuList', 'DashboardController@menuList');
Route::get('itemList', 'DashboardController@itemList');
Route::post('menuCreate', 'DashboardController@menuCreate');
Route::post('itemCreate', 'DashboardController@itemCreate');
Route::post('menuDelete', 'DashboardController@menuDelete');
Route::post('delete/{id}', 'DashboardController@delete');

Route::get('fileList', 'DashboardController@fileList');
Route::post('fileUpload', 'DashboardController@fileUpload');

Route::get('gridInfo', 'DashboardController@gridInfo');
Route::post('gridCraete', 'DashboardController@gridCraete');



