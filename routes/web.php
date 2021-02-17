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

Auth::routes(['register'=>false]);/* these routes is for login */

/*this is created to fetch data from old msp please dont remove or hit this route*/

Route::get('fetchapi/locations', 'TestController@locations');
Route::get('fetchapi/course','TestController@index'); /* To fetch course, topic, category and related content*/ 
Route::get('fetchapi/bundle','TestController@bundle'); /* To fetch course, topic, category and related content*/ 
Route::get('fetchapi/popular','TestController@popular'); /* To fetch course, topic, category and related content*/ 




Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/contactus', function () {
    return view('contactus');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/testimonial', function () {
    return view('testimonial');
});
Route::get('/onsite', function () {
    return view('onsite');
});
