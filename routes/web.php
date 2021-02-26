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
Route::get('/onsite', 'OnsiteController@index')->name('onsite');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{blog}', 'BlogController@detail')->name('blogDetail');


/*Enquiry Routes*/

Route::post('/send/enquiry','EnquiryController@insertEnquiry')->name('sendEnquiry');

Route::post('/enquiry/validate',"EnquiryController@validateEnquiry")->name('validateEnquiry');

/*End Enquiry Routes*/


Route::get('search','SearchController@search')->name('SearchCourse');
Route::get('/autocomplete/course','SearchController@loadCourses')->name('courseAutoComplete');
Route::get('/autocomplete/blog','SearchController@loadBlogs')->name('blogAutoComplete');
// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('booking/detail/{id}',['as'=>"BookingDetail","uses"=>"cms\PurchaseController@bookingDetail"]);

// Route::get('/blog', function () {
//     return view('blog');
// });
// Route::get('/blog-detail', function () {
//     return view('blog-detail');
// });
Route::get('/offer', function () {
    return view('offer');
});

Route::get('/certification', function () {
    return view('certification');
});
Route::get('/courses', function () {
    return view('courses');
});
Route::get('/catalogue', function () {
    return view('catalogue');
});
Route::get('/emptycart', function () {
    return view('emptycart');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/privacy-policy',function(){
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-and-conditions',function(){

})->name('terms-and-conditions');
Route::get('/third-party-trademarks',function(){

})->name('third-party');

Route::get('/cookies',function(){
    
})->name('cookies');
Route::get('/topic',function(){
       return view('topic');
})->name('topic');

Route::fallback(function(){
    return  redirect()->route('404');
  })->name('fallback');
  Route::get('/404',['as'=>'404','uses'=>'ErrorController@index']);

Route::post('/thank-you','EnquiryController@postEnquiryPage')->name('enquiryResponse');

