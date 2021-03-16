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
Route::get('fetchapi/only-courses','TestController@onlyCourses'); /* To fetch only courses and related content*/ 
Route::get('fetchapi/countryLocations','TestController@countryLocations'); /* To fetch only courses and related content*/ 
Route::get('fetchapi/country','TestController@Country'); /* To fetch only courses and related content*/ 

Route::get('match/topic', 'TestController@matchTopic');


Auth::routes(['register'=>false]);
/* these routes is for login */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('homeRoute');

/* Filter Routes */
Route::post('filter/global',"FilterController@commonFilter")->name("commonFilter");
Route::post('/filter/topic', 'FilterController@getTopics')->name('filterTopic');
Route::post('/filter/course', 'FilterController@getCourses')->name('filterCourse');
Route::post('/filter-course','CourseController@filter')->name('courseFilterRoute');

Route::get('/contact-us', 'ContactController@index')->name('contactUs');
Route::get('/about-us', 'AboutController@index')->name('aboutUs');
Route::get('/testimonials', 'TestimonialController@index')->name('testimonials');

/* Location Routes */
Route::get('/training-locations', 'LocationController@index')->name('locations');
Route::get('/training-locations/{location}', 'LocationController@detail')->name('locationDetail');

Route::get('/onsite', 'OnsiteController@index')->name('onsite');

/* Blog Routes */
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{blog}', 'BlogController@detail')->name('blogDetail');

Route::any('/thank-you','ThanksController@index')->name('thanks');


/*Enquiry Routes*/

Route::post('/send/enquiry','EnquiryController@insertEnquiry')->name('sendEnquiry');

Route::post('/enquiry/validate',"EnquiryController@validateEnquiry")->name('validateEnquiry');

/*End Enquiry Routes*/


Route::get('search','SearchController@search')->name('SearchCourse');
Route::get('/autocomplete/course','SearchController@loadCourses')->name('courseAutoComplete');
Route::get('/autocomplete/blog','SearchController@loadBlogs')->name('blogAutoComplete');


Route::get('/training-courses', 'CatalogueController@index')->name('catalogue');
Route::get('/training-courses/{category}', 'CategoryController@index')->name('categoryPage');
Route::get('/training-courses/{category}/{topic}', 'TopicController@index')->name('topicPage');
Route::get('/training-courses/{category}/{topic}/{course}/{location?}', 'CourseController@index')->name('coursePage');

Route::get('booking/detail/{id}',['as'=>"BookingDetail","uses"=>"cms\PurchaseController@bookingDetail"]);

Route::get('/booking/online/{id}',['as'=>'onlineBooking','uses'=>"CartController@addToCart"]);
Route::get('/booking/classroom/{id}',['as'=>'classroomBooking','uses'=>"CartController@addToCart"]);
Route::get('/booking/virtual/{id}',['as'=>'virtualBooking','uses'=>"CartController@addToCart"]);

//Cart Routes
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/detail', 'CartController@cartDetail')->name('cartDetail');
Route::get('/summary',['as'=>'summary','uses'=>'SummaryController@index']);
Route::post('/cart/checkout',['as'=>'cartCheckout', 'uses'=>"CheckoutController@index"]);
Route::post('/cart/content/clear',['as'=>'cartDestroyRoute','uses'=>'CartController@clearCart']);

//ajax requests
Route::get('/cart/update/qty',['as'=>'updateCartQuantity','uses'=>'CartController@updateQuantity']); // ajax
Route::get('/cart/remove/item',['as'=>'removeCartItem','uses'=>'CartController@removeItem']);
Route::get('/cart/customerDetail/submit',['as'=>'customerDetailSubmit','uses'=>'CartController@submitCustomerDetail']);
Route::get('/cart/delegateDetail/submit',['as'=>'delegateDetailSubmit','uses'=>'CartController@submitDelegateDetail']);
Route::get('/cart/billingDetail/submit',['as'=>'billingDetailSubmit','uses'=>'CartController@submitBillingDetail']);
Route::get('cart/customer/data',['as'=>'customerData','uses'=>'CartController@customerData']);

//certification
Route::get('/certification-programmes','CertificationController@index')->name('certification');
Route::get('/certification-programmes/{certification}','CertificationController@certificationDetail')->name('certificationDetail');

Route::get('/bundle-offer','BundleOfferController@index')->name('bundleOffer');

Route::get('knowledgepass','KnowledgepassController@index')->name('knowledgepass');

Route::get('/privacy-policy','CommonPageController@index')->name('privacy-policy');

Route::get('/terms-and-conditions','CommonPageController@index')->name('terms-and-conditions');

Route::get('/third-party-trademarks','CommonPageController@index')->name('third-party');

Route::get('/cookies','CommonPageController@index')->name('cookies');

Route::group(['prefix' => '{country?}','where'=>['country'=>'[a-z]{2}'],'middleware' => 'country'], function () {
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('homeRoute');
    
    Route::post('filter/global',"FilterController@commonFilter")->name("commonFilter");
    Route::post('/filter/topic', 'FilterController@getTopics')->name('filterTopic');
    Route::post('/filter/course', 'FilterController@getCourses')->name('filterCourse');
    Route::post('/filter-course','CourseController@filter')->name('courseFilterRoute');

    Route::get('/contact-us', 'ContactController@index')->name('contactUs');
    Route::get('/about-us', 'AboutController@index')->name('aboutUs');
    Route::get('/testimonials', 'TestimonialController@index')->name('testimonials');

    /* Location Route */
    Route::get('/training-locations', 'LocationController@index')->name('locations');
    Route::get('/training-locations/{location}', 'LocationController@detail')->name('locationDetail');

    Route::get('/onsite', 'OnsiteController@index')->name('onsite');

    /* Blog Route */
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{blog}', 'BlogController@detail')->name('blogDetail');

    Route::get('knowledgepass','KnowledgepassController@index')->name('knowledgepass');

    Route::any('/thank-you','ThanksController@index')->name('thanks');
    
    
    /*Enquiry Routes*/
    
    Route::post('/send/enquiry','EnquiryController@insertEnquiry')->name('sendEnquiry');  
    Route::post('/enquiry/validate',"EnquiryController@validateEnquiry")->name('validateEnquiry');
    
    /*End Enquiry Routes*/
    
    
    Route::get('search','SearchController@search')->name('SearchCourse');
    Route::get('/autocomplete/course','SearchController@loadCourses')->name('courseAutoComplete');
    Route::get('/autocomplete/blog','SearchController@loadBlogs')->name('blogAutoComplete'); 
    Route::get('/training-courses', 'CatalogueController@index')->name('catalogue');
    Route::get('/training-courses/{category}', 'CategoryController@index')->name('categoryPage');
    Route::get('/training-courses/{category}/{topic}', 'TopicController@index')->name('topicPage');
    Route::get('/training-courses/{category}/{topic}/{course}/{location?}', 'CourseController@index')->name('coursePage');
    Route::get('booking/detail/{id}',['as'=>"BookingDetail","uses"=>"cms\PurchaseController@bookingDetail"]);   
    Route::get('/booking/online/{id}',['as'=>'onlineBooking','uses'=>"CartController@addToCart"]);
    Route::get('/booking/classroom/{id}',['as'=>'classroomBooking','uses'=>"CartController@addToCart"]);
    Route::get('/booking/virtual/{id}',['as'=>'virtualBooking','uses'=>"CartController@addToCart"]);
    
    //Cart Routes
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/cart/detail', 'CartController@cartDetail')->name('cartDetail');
    Route::get('/summary',['as'=>'summary','uses'=>'SummaryController@index']);
    Route::post('/cart/checkout',['as'=>'cartCheckout', 'uses'=>"CheckoutController@index"]);
    Route::post('/cart/content/clear',['as'=>'cartDestroyRoute','uses'=>'CartController@clearCart']);
    
    //ajax requests
    Route::get('/cart/update/qty',['as'=>'updateCartQuantity','uses'=>'CartController@updateQuantity']); // ajax
    Route::get('/cart/remove/item',['as'=>'removeCartItem','uses'=>'CartController@removeItem']);
    Route::get('/cart/customerDetail/submit',['as'=>'customerDetailSubmit','uses'=>'CartController@submitCustomerDetail']);
    Route::get('/cart/delegateDetail/submit',['as'=>'delegateDetailSubmit','uses'=>'CartController@submitDelegateDetail']);
    Route::get('/cart/billingDetail/submit',['as'=>'billingDetailSubmit','uses'=>'CartController@submitBillingDetail']);
    Route::get('cart/customer/data',['as'=>'customerData','uses'=>'CartController@customerData']);
    
    //certification
    Route::get('/certification-programmes','CertificationController@index')->name('certification');
    Route::get('/certification-programmes/{certification}','CertificationController@certificationDetail')->name('certificationDetail');
    
    Route::get('/bundle-offer','BundleOfferController@index')->name('bundleOffer');
    
    Route::get('/privacy-policy','CommonPageController@index')->name('privacy-policy');
    Route::get('/terms-and-conditions','CommonPageController@index')->name('terms-and-conditions');
    Route::get('/third-party-trademarks','CommonPageController@index')->name('third-party');
    Route::get('/cookies','CommonPageController@index')->name('cookies');

});

Route::fallback(function(){
    return  redirect()->route('404');
  })->name('fallback');
Route::get('/404',['as'=>'404','uses'=>'ErrorController@index']);


