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
Route::get('/location', function () {
    return view('location');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/offer', function () {
    return view('offer');
});
