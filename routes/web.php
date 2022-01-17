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
require_once 'category-route/category-router.php';
require_once 'brand-route/brand-router.php';

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/edit-user/{id}',[
    'uses'=>'HomeController@editUser',
    'as'=>'edit-user'
]);
Route::get('/delete-user/{id}',[
    'uses'=>'HomeController@delete',
    'as'=>'delete-user'
]);
Route::post('update-user',[
    'uses'=>'HomeController@update',
    'as'=>'update-user'
]);
Route::get('/edit-user-profile/{id}',[
    'uses'=>'HomeController@editUserProfile',
    'as'=>'edit-user-profile'
]);
Route::post('/update-user-profile',[
    'uses'=>'HomeController@updateUserProfile',
    'as'=>'update-user-profile'
]);

Route::get('/error',function (){
    return view('error.message');
})->name('error ');

Route::get('/verify-user',function (){
    return view('error.verify-message');
})->name('verify-user ');
