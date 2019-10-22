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

/*
|******Developpe by anna alias Ismael foletia **********************|
|******Use Laravel //Artisan //Illuminate //make world great again***|
|******PhoneNumber: 695930773****************************************|
*/

Route::get('/', 'BaseController@index');
Route::get('/detail', 'BaseController@detail');
Route::get('/articles', 'BaseController@all');
Route::post('/articles', 'BaseController@all');
Route::get('/subscribe', 'BaseController@subscribe');
Route::post('/subscribe', 'BaseController@subscribe');
Route::post('/', 'BaseController@index');
Route::get('deleteAdmin', 'HomeController@deleteAdmin');
Route::get('deleteApplicant', 'HomeController@deleteApplicant');
Route::get('deleteNewsLetter', 'HomeController@deleteNewsLetter');
Route::get('deleteCat', 'HomeController@deleteCat');
Route::get('edit', 'HomeController@editAdmin');
Route::get('saveAdmin', 'HomeController@saveAdmin');
Route::get('applicant', 'HomeController@applicantDetail');
Route::post('applicant', 'HomeController@applicantDetail');


Route::get('home', 'HomeController@index');
Route::post('home', 'HomeController@index');
Route::resource('article', 'ArticleController');
Auth::routes();
 
