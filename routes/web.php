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

Auth::routes(['register'=>false]);
/* these routes is for login */


Route::get('/contact-us', 'ContactController@index')->name('contactUs');
Route::get('/about-us', 'AboutController@index')->name('aboutUs');
Route::get('/testimonials', 'TestimonialController@index')->name('testimonials');



Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/onsite', function () {
    return view('onsite');
});
Route::get('/location', function () {
    return view('location');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/offer', function () {
    return view('offer');
});
Route::get('/location-detail', function () {
    return view('location-detail');
});
Route::get('/certification', function () {
    return view('certification');
});