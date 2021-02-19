<?php
use Illuminate\Support\Facades\Route;
Route::get('/','DashboardController@list')->name('CmsIndex');
Route::get('/dashboard','DashboardController@list')->name('dashboard');
Route::post('/summernoteimage/upload','DashboardController@ImageUpload')->name('ImageUpload');

// Route::get('/course','CourseController@list')->name('courseList');
Route::get('/user','UserController@userList')->name('userList');
Route::get('/user/insert','UserController@createUser')->name('createUser');
Route::post('/user/insert','UserController@insertUser')->name('insertUser');
Route::get('/user/update/{user}','UserController@editUser')->name('editUser');
Route::post('/user/update/{user}','UserController@updateUser')->name('updateUser');
Route::post('/user/delete/{user}',"UserController@deleteUser")->name('deleteUser');
Route::get("/changepassword","UserController@changepass")->name('changePassword');
Route::post('changepassword', 'UserController@changePassword')->name('changepasswordRoute');


Route::get('/role','UserController@roleList')->name('roleList');
Route::get('/role/insert','UserController@createRole')->name('createRole');
Route::post('/role/insert','UserController@insertRole')->name('insertRole');
Route::get('/role/update/{role}','UserController@editRole')->name('editRole');
Route::post('/role/update/{role}','UserController@updateRole')->name('updateRole');
Route::post('/role/delete/{role}','UserController@deleteRole')->name('deleteRole');

Route::get('/permission','UserController@permissionList')->name('permissionList');
Route::get('/permission/insert','UserController@createPermission')->name('createPermission');
Route::post('/permission/insert','UserController@insertPermission')->name('insertPermission');
Route::get('/permission/update/{permission}','UserController@editPermission')->name('editPermission');
Route::post('/permission/update/{permission}','UserController@updatePermission')->name('updatePermission');
Route::post('/permission/delete/{permission}','UserController@deletePermission')->name('deletePermission');

Route::post('/role/assign','UserController@assignRoles')->name('assignRole'); // was updateRoles
Route::post('/permission/assign','UserController@assignPermission')->name('assignPermission');
Route::get('/module/auto-complete','UserController@loadModules')->name('moduleAutoComplete');// autocomplete module
// country routes
Route::get('/country','CountryController@list')->name('countryList');
Route::post('/country','CountryController@filterList')->name('countryList');
Route::get('/country/insert','CountryController@create')->name('createCountry');
Route::post('/country/insert','CountryController@insert')->name('insertCountry');
Route::get('/country/update/{country_code}','CountryController@edit')->name('editCountry');
Route::post('/country/update/{country_code}','CountryController@update')->name('updateCountry');
Route::post('/country/delete/{country_code}','CountryController@delete')->name('deleteCountry');

Route::get("/country/get/locations","CountryController@getLocations")->name("locationsOfCountry");
Route::get("/country/get/schedule/locations","ScheduleController@getLocationsForCountry")->name("scheduleLocationsOfCountry");

Route::get('/location','LocationController@list')->name('locationList');
Route::post('/location','LocationController@filterList')->name('locationList');
Route::get('/location/insert','LocationController@create')->name('createLocation');
Route::post('/location/insert','LocationController@insert')->name('insertLocation');
Route::get('/location/update/{location}','LocationController@edit')->name('editLocation');
Route::post('/location/update/{location}','LocationController@insert')->name('updateLocation');
Route::post('/location/delete/{location}','LocationController@delete')->name('deleteLocation');
Route::get('location/region/fetch','LocationController@getRegion')->name('autoRegion');
// venue routes
Route::get('/venue','VenueController@list')->name('venueList');
Route::get('/venue/insert','VenueController@create')->name('createVenue');
Route::post('/venue/insert','VenueController@insert')->name('insertVenue');
Route::get('/venue/update/{venue}','VenueController@edit')->name('editVenue');
Route::post('/venue/update/{venue}','VenueController@update')->name('updateVenue');
Route::post('/venue/delete/{venue}','VenueController@delete')->name('deleteVenue');

Route::get('/category','CategoryController@list')->name('categoryList');
Route::get('/category/insert','CategoryController@create')->name('createCategory');
Route::post('/category/insert','CategoryController@insert')->name('insertCategory');
Route::get('/category/update/{category}','CategoryController@edit')->name('editCategory');
Route::post('/category/update/{category}','CategoryController@update')->name('updateCategory');
Route::post('/category/delete/{category}','CategoryController@delete')->name('deleteCategory');
//categoryContent
Route::get('/category/content','CategoryController@contentList')->name('categoryContentList');
Route::get('/category/content/insert','CategoryController@contentCreate')->name('createCategoryContent');
Route::post('/category/content/insert','CategoryController@contentInsert')->name('insertCategoryContent');
Route::get('/category/content/update/{categoryDetail}','CategoryController@contentEdit')->name('editCategoryContent');
Route::post('/category/content/update/{categoryDetail}','CategoryController@contentUpdate')->name('updateCategoryContent');
Route::post('/category/content/delete/{categoryDetail}','CategoryController@contentDelete')->name('deleteCategoryContent');


Route::get('/topic','TopicController@list')->name('topicList');
Route::get('/topic/insert','TopicController@create')->name('createTopic');
Route::post('/topic/insert','TopicController@insert')->name('insertTopic');
Route::get('/topic/update/{topic}','TopicController@edit')->name('editTopic');
Route::post('/topic/update/{topic}','TopicController@update')->name('updateTopic');
Route::post('/topic/delete/{topic}','TopicController@delete')->name('deleteTopic');

Route::get('/topic/content','TopicController@contentList')->name('topicContentList');
Route::get('/topic/content/insert','TopicController@contentCreate')->name('createTopicContent');
Route::post('/topic/content/insert','TopicController@contentInsert')->name('insertTopicContent');
Route::get('/topic/content/update/{topicDetail}','TopicController@contentEdit')->name('editTopicContent');
Route::post('/topic/content/update/{topicDetail}','TopicController@contentUpdate')->name('updateTopicContent');
Route::post('/topic/content/delete/{topicDetail}','TopicController@contentDelete')->name('deleteTopicContent');

Route::post('/faq/insert','TopicController@insertFaq')->name('insertFaq');
Route::get('/faq/multiple','TopicController@multipleFaq')->name('insertMultipleFaq');
Route::post('/faq/insertmultiple','TopicController@insertMultipleFaq')->name('insertMultipleFaq');
Route::post('/faq/delete/{faq}','TopicController@deleteFaq')->name('deleteFaq');
Route::post('/faq/sort','TopicController@sortFaq')->name('sortFaq');

Route::get('/unlinkedTopic','TopicController@unlinkedTopicList')->name('unlinkTopic');
Route::post('/linkCategory/{id}','TopicController@linkCategory')->name('linkCategoryRoute');

Route::get('/course','CourseController@list')->name('courseList');
Route::get('/course/insert','CourseController@create')->name('createCourse');
Route::post('/course/insert','CourseController@insert')->name('insertCourse');
Route::get('/course/update/{course}','CourseController@edit')->name('editCourse');
Route::post('/course/update/{course}','CourseController@update')->name('updateCourse');
Route::post('/course/delete/{course}','CourseController@delete')->name('deleteCourse');

Route::get('/unlinkedCourse','CourseController@unlinkedCourseList')->name('unlinkCourse');
Route::post('/linkTopic/{id}','CourseController@linkTopic')->name('linkTopicRoute');

// Course Bulletpoint
Route::get('/course/bulletPoint','CourseController@bulletPointList')->name('bulletPointList');
Route::get('/course/bulletPoint/insert','CourseController@createBulletPoint')->name('createBulletPoint');
Route::post('/course/bulletPoint/insert/{module}','CourseController@submitBulletPoint')->name('insertBulletPoint');
Route::get('/course/bulletPoint/update/{id}','CourseController@editBulletPoint')->name('editBulletPoint');
Route::post('/course/bulletPoint/update/{module}','CourseController@submitBulletPoint')->name('updateBulletPoint');
Route::any('/course/bulletPoint/delete/{courseDetail}','CourseController@deleteBulletPoint')->name('deleteBulletPoint');
// Category Bulletpoint
Route::get('/category/bulletPoint','CategoryController@bulletPointList')->name('categoryBulletPointList');
Route::get('/category/bulletPoint/insert','CategoryController@createBulletPoint')->name('categoryCreateBulletPoint');
Route::post('/category/bulletPoint/insert/{module}','CategoryController@submitBulletPoint')->name('categoryInsertBulletPoint');
Route::get('/category/bulletPoint/update/{id}','CategoryController@editBulletPoint')->name('categoryEditBulletPoint');
Route::post('/category/bulletPoint/update/{module}','CategoryController@submitBulletPoint')->name('categoryUpdateBulletPoint');
Route::post('/category/bulletPoint/delete/{courseDetail}','CategoryController@deleteBulletPoint')->name('categoryDeleteBulletPoint');
// Topic BulletPoint
Route::get('/topic/bulletPoint','TopicController@bulletPointList')->name('topicBulletPointList');
Route::get('/topic/bulletPoint/insert','TopicController@createBulletPoint')->name('topicCreateBulletPoint');
Route::post('/topic/bulletPoint/insert/{module}','TopicController@submitBulletPoint')->name('topicInsertBulletPoint');
Route::get('/topic/bulletPoint/update/{id}','TopicController@editBulletPoint')->name('topicEditBulletPoint');
Route::post('/topic/bulletPoint/update/{module}','TopicController@submitBulletPoint')->name('topicUpdateBulletPoint');
Route::post('/topic/bulletPoint/delete/{courseDetail}','TopicController@deleteBulletPoint')->name('topicDeleteBulletPoint');
// Course Whatsincluded
Route::get('/course/whatsincluded','CourseController@whatsincludedlist')->name('whatsIncludedList');
Route::get('/course/whatsincluded/insert','CourseController@whatsincludedcreate')->name('createwhatsincluded');
Route::get('/course/whatsincluded/sort','CourseController@sortWhatsIncluded')->name('sortWhatsIncluded');
Route::post('/course/whatsincluded/insert','CourseController@whatsincludedinsert')->name('insertwhatsincluded');
Route::post('/course/whatsincluded/delete/{module}/{whatsincluded}','CourseController@whatsincludeddelete')->name('deletewhatsincluded');
// Category Whatsincluded
Route::get('/category/whatsincluded','CategoryController@whatsincludedlist')->name('categoryWhatsIncludedList');
Route::get('/category/whatsincluded/insert','CategoryController@whatsincludedcreate')->name('categoryCreateWhatsincluded');
Route::get('/category/whatsincluded/sort','CategoryController@sortWhatsIncluded')->name('categorySortWhatsIncluded');
Route::post('/category/whatsincluded/insert','CategoryController@whatsincludedinsert')->name('categoryInsertWhatsincluded');
Route::post('/category/whatsincluded/delete/{module}/{whatsincluded}','CategoryController@whatsincludeddelete')->name('categoryDeleteWhatsincluded');
// Topic Whatsincluded
Route::get('/topic/whatsincluded','TopicController@whatsincludedlist')->name('topicWhatsIncludedList');
Route::get('/topic/whatsincluded/insert','TopicController@whatsincludedcreate')->name('topicCreateWhatsincluded');
Route::get('/topic/whatsincluded/sort','TopicController@sortWhatsIncluded')->name('topicSortWhatsIncluded');
Route::post('/topic/whatsincluded/insert','TopicController@whatsincludedinsert')->name('topicInsertWhatsincluded');
Route::post('/topic/whatsincluded/delete/{module}/{whatsincluded}','TopicController@whatsincludeddelete')->name('topicDeleteWhatsincluded');

// whatsIncluded
Route::get('/whatsincluded','WhatsIncludedController@list')->name('whatsincludedListRoute');
Route::get('/whatsincluded/insert','WhatsIncludedController@form')->name('createWhatsIncluded');
Route::post('/whatsincluded/insert','WhatsIncludedController@insert')->name('insertWhatsIncluded');
Route::get('/whatsincluded/update/{whatsincluded}','WhatsIncludedController@edit')->name('editWhatsIncluded');
Route::post('/whatsincluded/update','WhatsIncludedController@update')->name('updateWhatsIncluded');
Route::post('/whatsincluded/delete/{whatsincluded}','WhatsIncludedController@delete')->name('deleteWhatsIncluded');

Route::get('/online-course','OnlineCourseController@list')->name('onlinecourseList');
Route::post('/upload-video','OnlineCourseController@uploadVideo')->name('uploadVideo');
Route::get('/onlinecourse/insert','OnlineCourseController@create')->name('createOnlineCourse');
Route::post('/onlinecourse/insert','OnlineCourseController@insert')->name('insertOnlineCourse');
Route::get('/onlinecourse/update/{course}','OnlineCourseController@edit')->name('editOnlineCourse');
Route::post('/onlinecourse/update/{course}','OnlineCourseController@update')->name('updateOnlineCourse');
Route::post('/onlinecourse/delete/{course}','OnlineCourseController@delete')->name('deleteOnlineCourse');


Route::get('/course/get/detail',function()
{
  $id = Illuminate\Support\Facades\Input::get('course');
  return App\Models\Course::findOrFail($id)->toJson();
})->name('courseDetail');

Route::get('/accreditation','AccreditationController@list')->name('accreditationList');
Route::get('/accreditation/create','AccreditationController@create')->name('accreditationCreate');
 Route::post('/accreditation/insert','AccreditationController@insert')->name('InsertAccreditation');
// Route::get('/accredition/insert','AccreditationController@insert')->name('accreditationInsert');
 Route::get('/accreditation/update/{accreditation}','AccreditationController@edit')->name('editAccreditation');
 Route::post('/accreditation/update/{accreditation}','AccreditationController@update')->name('updateAccreditation');
 Route::post('/accreditation/delete/{accreditation}','AccreditationController@delete')->name('deleteAccreditation');
// Route::get('/demo','LocationController@demo');
Route::get('/course/content','CourseController@contentList')->name('courseContentList');
Route::get('/course/content/insert','CourseController@contentCreate')->name('createCourseContent');
Route::post('/course/content/insert','CourseController@contentInsert')->name('insertCourseContent');
Route::get('/course/content/update/{courseDetail}','CourseController@contentEdit')->name('editCourseContent');
Route::post('/course/content/update/{courseDetail}','CourseController@contentUpdate')->name('updateCourseContent');
Route::post('/course/content/delete/{courseDetail}','CourseController@contentDelete')->name('deleteCourseContent');

Route::get('/pagedetail','PageDetailController@list')->name('pageDetailList');
Route::get('/pagedetail/insert','PageDetailController@create')->name('createPageDetail');
Route::post('/pagedetail/insert','PageDetailController@insert')->name('insertPageDetail');
Route::get('/pagedetail/update/{pageDetail}','PageDetailController@edit')->name('editPageDetail');
Route::post('/pagedetail/update/{pageDetail}','PageDetailController@update')->name('updatePageDetail');
Route::post('/pagedetail/delete/{pageDetail}','PageDetailController@delete')->name('deletePageDetail');

Route::get('/schedule','ScheduleController@list')->name('scheduleList');
Route::get('/schedule/insert','ScheduleController@create')->name('createSchedule');
Route::post('/schedule/insert','ScheduleController@insert')->name('insertSchedule');
Route::get('/schedule/update/{schedule}','ScheduleController@edit')->name('editSchedule');
Route::post('/schedule/update/{schedule}','ScheduleController@update')->name('updateSchedule');
Route::post('/schedule/delete/{schedule}','ScheduleController@delete')->name('deleteSchedule');
Route::get('/schedule/fetch','ScheduleController@getSchedule')->name('getSchedule');
Route::get('/schedule/manualschedule/list','ScheduleController@manualschedulelist')->name('manualScheduleList');
Route::post('/manualschedule/delete/{schedule}','ScheduleController@deletemanualschedule')->name('deleteManualSchedule');
Route::get('/manualschedule/update/{schedule}','ScheduleController@editmanualschedule')->name('editManualSchedule');
Route::post('/manualschedule/update/{schedule}','ScheduleController@updatemanualschedule')->name('updateManualSchedule');
Route::post('/schedule/fetch','ScheduleController@fetch')->name('fetchSchedule');
Route::get('/schedule/manage/price','ScheduleController@manageCoursePrice')->name('manageCoursePrice');
Route::get('/schedule/manage/price/{course}','ScheduleController@manageSchedulePrice')->name('manageSchedulePrice');
Route::post('/schedule/manage/price/{course}/{venue?}','ScheduleController@updateCustomPrice')->name('updateCustomPrice');
Route::get('/schedule/fetch/api-status','ScheduleController@ApiStatus')->name('fetchApiStatus');

Route::get('/schedule/onlineprice','ScheduleController@onlinePrices')->name('onlinePriceList');
Route::post('/schedule/onlineprice/update/{onlineId}',"ScheduleController@updateOnlinePrice")->name('updateOnlinePrice');
Route::get('/schedule/onlineprice/addons/{online}',"ScheduleController@courseAddon")->name('courseAddonList');

Route::get('/popular/list',"PopularController@list")->name("popularItems");
Route::post('/popular/delete/{popular}',"PopularController@delete")->name("deletePopular");
Route::any('/popular/sort',"PopularController@sort")->name("sortPopular");



Route::post('/purchase/store', ['as' => 'purchaseResponse', 'uses' => 'PurchaseController@storeDetails']);
Route::get('/purchase/list',['as'=>'purchaseList', 'uses'=>'PurchaseController@purchaseList']);
Route::get('/booking/detail/{id}',['as'=>"BookingDetail","uses"=>"PurchaseController@bookingDetail"]);
Route::get('/purchase',['as'=>'createPurchase', 'uses'=>'PurchaseController@index']);
// Route::get('/purchase/view', ['as' => 'AdminPurchase', 'uses' => 'PurchaseController@viewDetails']);
Route::post('/purchase/add', ['as' => 'insertPurchase', 'uses' => 'PurchaseController@addPurchase']);
Route::post('/purchase/venue', ['as' => 'purchase_fetch_venue', 'uses' => 'PurchaseController@getVenueDetails']);
Route::post('/purchase/schedule', ['as' => 'purchase_fetch_schedule', 'uses' => 'PurchaseController@getSchedule']);		
Route::get('/convert/currency/{currency}', 'PurchaseController@convertPriceInGBP');
Route::get('/country/select/{id}',function($id){
  $country  =  \App\Models\Country::where('country_code',$id)->first();
  return $country->toJson();
});

Route::get('/article/newslist','ArticleController@newsList')->name('newsList');
Route::get('/article/create','ArticleController@create')->name('createNews');
Route::post('/article/insert','ArticleController@insert')->name('insertArticle');
Route::get('/article/edit/{article}','ArticleController@edit')->name('editArticle');
Route::post('/article/update/{article}','ArticleController@update')->name('updateArticle');
Route::post('/article/delete/{article}','ArticleController@delete')->name('deleteArticle');
Route::get('/article/bloglist','ArticleController@blogList')->name('blogList');
Route::get('/article/auto-complete','ArticleController@loadTags')->name('tagAutoComplete');
Route::get('/tag/taglist','TagController@tagList')->name('tagList');
Route::get('/tag/update/{tag}','TagController@edit')->name('editTag');
Route::post('/tag/update/{tag}','TagController@update')->name('updateTag');
Route::post('/tag/delete/{tag}','TagController@delete')->name('deleteTag');
Route::get('/testimonials/testimonialsList','TestimonialController@testimonialList')->name('testimonialList');
Route::get('/testimonials/create','TestimonialController@create')->name('createTestimonial');
Route::post('/testimonials/insert','TestimonialController@insert')->name('insertTestimonial');
Route::post('/testimonials/update/{testimonial}','TestimonialController@update')->name('editTestimonial');
Route::get('/testimonials/update/{testimonial}','TestimonialController@edit')->name('updateTestimonial');

Route::post('/testimonials/delete/{testimonial}','TestimonialController@delete')->name('deleteTestimonial');
Route::get('/enquiry/enquirylist','EnquiryController@enquiryList')->name('enquiryList');
Route::get('/enquirydetail/{id}','EnquiryController@enquiryDetail')->name('enquirydetail');

Route::get('/website','SettingController@websiteList')->name('websiteList');
Route::get('/website/create','SettingController@create')->name('createwebsite');
Route::post('/website/insert','SettingController@insert')->name('insertwebsite');
Route::get('/website/edit/{website}','SettingController@edit')->name('editWebsite');
Route::get('/website/update/{website}','SettingController@update')->name('updateWebsite');
Route::get('/websitedetail','SettingController@websiteDetailList')->name('websiteDetailList');
Route::get('/websitedetail/create','SettingController@createWebsiteDetail')->name('createwebsiteDetail');
Route::post('/websitedetail/insert','SettingController@insertWebsiteDetail')->name('insertWebsiteDetail');
Route::get('/websitedetail/editdetail/{websitedetail}','SettingController@editWebsiteDetail')->name('editWebsiteDetail');
Route::post('/websitedetail/updatedetail/{websitedetail}','SettingController@updateWebsiteDetail')->name('updateWebsiteDetail');
Route::post('/websitedetail/delete/{websitedetail}','SettingController@deleteWebsiteDetail')->name('deleteWebsiteDetail');

Route::get('/website/Dashboard','WebsiteDashboardController@index')->name('websiteDashboard');
Route::get('/website/Dashboard/course/{course}','WebsiteDashboardController@courseDashboard')->name('courseDashboard');

Route::get('/newsletter','NewsletterController@newsletterList')->name('newsletterList');

Route::get('/orders','OrderController@orderList')->name('orderList');
Route::get('/orderdetail/{id}','OrderController@orderDetail')->name('orderDetail');

Route::get('/tagtrash','TagController@tagtrashList')->name('tagTrashList');
Route::get('/tag/restoretag/{id}','TagController@restoreTag')->name('restoreTag');
Route::get('/tag/deletetag/{id}','TagController@forceDeleteTag')->name('forceDeleteTag');

Route::get('/venuetrash','VenueController@venuetrashList')->name('venueTrashList');
Route::get('/venue/restorevenue/{id}','VenueController@restoreVenue')->name('restoreVenue');
Route::get('/venue/deletevenue/{id}','VenueController@forceDeleteVenue')->name('forceDeleteVenue');


Route::get('/countrytrash','CountryController@countrytrashList')->name('countryTrashList');
Route::get('/country/restorevenue/{country_code}','CountryController@restoreCountry')->name('restoreCountry');
Route::get('/country/deletecountry/{country_code}','CountryController@forceDeleteCountry')->name('forceDeleteCountry');

Route::get('/locationtrash','LocationController@locationtrashList')->name('locationTrashList');
Route::get('/location/restorelocation/{id}','LocationController@restoreLocation')->name('restoreLocation');
Route::get('/location/deletelocation/{id}','LocationController@forceDeleteLocation')->name('forceDeleteLocation');


Route::get('/coursetrash','CourseController@coursetrashList')->name('courseTrashList');
Route::get('/course/restorecourse/{id}','CourseController@restoreCourse')->name('restoreCourse');
Route::get('/location/deletecourse/{id}','CourseController@forceDeleteCourse')->name('forceDeleteCourse');


Route::get('/categorytrash','CategoryController@categorytrashList')->name('categoryTrashList');
Route::get('/category/restorecategory/{id}','CategoryController@restoreCategory')->name('restoreCategory');
Route::get('/category/deletecategory/{id}','CategoryController@forceDeleteCategory')->name('forceDeleteCategory');


Route::get('/topictrash','TopicController@topictrashList')->name('topicTrashList');
Route::get('/topic/restoretopic/{id}','TopicController@restoreTopic')->name('restoreTopic');
Route::get('/topic/deletetopic/{id}','TopicController@forceDeleteTopic')->name('forceDeleteTopic');



Route::get('/articletrash','ArticleController@articletrashList')->name('articleTrashList');
Route::get('/article/restorearticle/{id}','ArticleController@restoreArticle')->name('restoreArticle');
Route::get('/article/deletearticle/{id}','ArticleController@forceDeleteArticle')->name('forceDeleteArticle');


Route::get('/testimonialtrash','TestimonialController@testimonialtrashList')->name('testimonialTrashList');
Route::get('/testimonial/restoretestimonial/{id}','TestimonialController@restoreTestimonial')->name('restoreTestimonial');
Route::get('/testimonial/deletetestimonial/{id}','TestimonialController@forceDeleteTestimonial')->name('forceDeletetestimonialRoute');

Route::get('/accreditationtrash','AccreditationController@accreditationtrashList')->name('accreditationTrashList');
Route::get('/accreditation/restoreAccreditation/{id}','AccreditationController@restoreAccreditation')->name('restoreAccreditation');
Route::get('/accreditation/deleteaccreditation/{id}','AccreditationController@forceDeleteAccreditation')->name('forceDeleteAccreditation');

Route::get('/resourceTrashList','ResourceController@trashList')->name('resourceTrash');
Route::get('/resource/restore/{id}','ResourceController@restore')->name('restoreResourceRoute');
Route::get('/resource/forceDelete/{id}','ResourceController@forceDelete')->name('forceDeleteResource');

Route::get('/bundletrash','BundleController@trashList')->name('bundleTrashList');
Route::get('/bundle/restoreBundle/{id}','BundleController@restore')->name('restoreBundleRoute');
Route::get('/bundle/forceDeleteBundle/{id}','BundleController@forceDelete')->name('forceDeleteBundle');

Route::get('/onlinecourse/trashList','OnlineCourseController@trashList')->name('onlineCourseTrash');
Route::get('/onlinecourse/restore/{id}','OnlineCourseController@restore')->name('restoreOnlineCourse');
Route::get('/onlinecourse/forceDelete/{id}','OnlineCourseController@forceDelete')->name('forceDeleteOnlineCourse');

Route::get('/urlredirect','RedirectController@UrlRedirectList')->name('urlRedirectList');
Route::get('/urlredirect/create','RedirectController@create')->name('createUrlRedirect');
Route::post('/urlredirect/insert','RedirectController@insert')->name('insertUrlRedirect');
Route::get('/urlredirect/edit/{url}','RedirectController@edit')->name('editUrlRedirect');
Route::post('/urlredirect/update/{url}','RedirectController@update')->name('updateUrlRedirect');
Route::post('/urlredirect/delete/{url}','RedirectController@delete')->name('deleteUrlRedirect');


Route::get('/socialmedia','SocialMediaController@socialList')->name('socialmediaList');
Route::get('/socialmedia/create','SocialMediaController@create')->name('createsocialmedia');
Route::post('/socialmedia/insert','SocialMediaController@insert')->name('insertsocialmedia');
Route::get('/socialmedia/edit/{id}','SocialMediaController@edit')->name('editsocialmedia');
Route::post('/socialmedia/update/{id}','SocialMediaController@update')->name('updatesocialmedia');
Route::post('/socialmedia/delete/{id}','SocialMediaController@delete')->name('deletesocialmedia');

Route::get('/resources','ResourceController@resourceList')->name('resourcesList');
Route::get('/resources/create','ResourceController@create')->name('createresources');
Route::post('/resources/insert','ResourceController@insert')->name('insertresources');
Route::get('/resources/edit/{id}','ResourceController@edit')->name('editresources');
Route::post('/resources/update/{id}','ResourceController@update')->name('updateresources');
Route::post('/resources/delete/{id}','ResourceController@delete')->name('deleteresources'); 


Route::get('test','LocationController@meta')->name('test');


Route::get('/bundle', 'BundleController@index')->name('bundleList');
Route::get('/bundle/create', 'BundleController@create')->name('createBundle');
Route::post('/bundle/insert', 'BundleController@store')->name('insertBundle');
Route::get('/bundle/edit/{id}','BundleController@edit')->name('editBundle');
Route::post('/bundle/update/{id}', 'BundleController@store')->name('updateBundle');
Route::post('/bundle/delete/{id}', 'BundleController@delete')->name('deleteBundle');

