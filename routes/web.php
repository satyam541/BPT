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
/*this is created to fetch data from old msp please dont remove or hit this route*/

Route::get('fetchapi/locations', 'TestController@locations');
Route::get('fetchapi/course','TestController@index'); /* To fetch course, topic, category and related content*/ 
Route::get('fetchapi/bundle','TestController@bundle'); /* To fetch course, topic, category and related content*/ 
Route::get('fetchapi/popular','TestController@popular'); /* To fetch course, topic, category and related content*/ 


Auth::routes(['register'=>false]);
/* these routes is for login */


Route::get('/contact-us', 'ContactController@index')->name('contactUs');
Route::get('/about-us', 'AboutController@index')->name('aboutUs');
Route::get('/testimonials', 'TestimonialController@index')->name('testimonials');
Route::get('/training-locations', 'LocationController@index')->name('locations');
Route::get('/training-locations/{location}', 'LocationController@detail')->name('locationDetail');



// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/onsite', function () {
    return view('onsite');
});

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/offer', function () {
    return view('offer');
});

Route::get('/certification', function () {
    return view('certification');
});