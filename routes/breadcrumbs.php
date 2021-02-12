
<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('userList'));
});

Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('user');
    $trail->push("Add  User", route('createUser'));
});

Breadcrumbs::for('edit_user', function ($trail,$user) {
    $trail->parent('user');
    $trail->push("Edit  " .$user->name, route('editUser',$user));
});


Breadcrumbs::for('role', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Role", route('roleList'));
});

Breadcrumbs::for('add_role', function ($trail) {
    $trail->parent('role');
    $trail->push("Add Role", route('createRole'));
});
Breadcrumbs::for('edit_role', function ($trail,$role) {
    $trail->parent('role');
    $trail->push("Edit ".$role->name, route('editRole',$role));
});


Breadcrumbs::for('permission', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Permission", route('permissionList'));
});

Breadcrumbs::for('add_permission', function ($trail) {
    $trail->parent('permission');
    $trail->push("Add Permission", route('createPermission'));
});
Breadcrumbs::for('edit_permission', function ($trail,$permission) {
    $trail->parent('permission');
    $trail->push("Edit ".$permission->moduleName, route('editPermission',$permission));
});

Breadcrumbs::for('bundle', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Bundle", route('bundleList'));
});

Breadcrumbs::for('add_bundle', function ($trail) {
    $trail->parent('bundle');
    $trail->push("Add Bundle");
});
Breadcrumbs::for('edit_bundle', function ($trail,$bundle) {
    $trail->parent('bundle');
    $trail->push("Edit ".$bundle->name);
});

Breadcrumbs::for('country', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Country", route('countryList'));
});

Breadcrumbs::for('add_country', function ($trail) {
    $trail->parent('country');
    $trail->push("Add Country", route('createCountry'));
});
Breadcrumbs::for('edit_country', function ($trail,$country) {
    $trail->parent('country');
    $trail->push("Edit ".$country->name, route('editCountry',$country));
});
Breadcrumbs::for('location', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Location", route('locationList'));
});

Breadcrumbs::for('add_location', function ($trail) {
    $trail->parent('location');
    $trail->push("Add Location", route('createLocation'));
});
Breadcrumbs::for('edit_location', function ($trail,$location) {
    $trail->parent('location');
    $trail->push("Edit ".$location->name, route('editLocation',$location));
});

Breadcrumbs::for('venue', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Venue", route('venueList'));
});

Breadcrumbs::for('add_venue', function ($trail) {
    $trail->parent('venue');
    $trail->push("Add Venue", route('createVenue'));
});
Breadcrumbs::for('edit_venue', function ($trail,$venue) {
    $trail->parent('venue');
    $trail->push("Edit ".$venue->name, route('editVenue',$venue));
});


Breadcrumbs::for('category', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Category", route('categoryList'));
});

Breadcrumbs::for('add_category', function ($trail) {
    $trail->parent('category');
    $trail->push("Add Category", route('createCategory'));
});
Breadcrumbs::for('edit_category', function ($trail,$category) {
    $trail->parent('category');
    $trail->push("Edit ".$category->name, route('editCategory',$category));
});


Breadcrumbs::for('topic', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Topic", route('topicList'));
});

Breadcrumbs::for('add_topic', function ($trail) {
    $trail->parent('topic');
    $trail->push("Add Topic", route('createTopic'));
});
Breadcrumbs::for('edit_topic', function ($trail,$topic) {
    $trail->parent('topic');
    $trail->push("Edit ".$topic->name, route('editTopic',$topic));
});

Breadcrumbs::for('topic_content', function ($trail,$topic) {
    $trail->parent('topic');
    $trail->push("Topic Content ", route('topicContentList',['topic'=>$topic]));
});


Breadcrumbs::for('add_topic_content', function ($trail,$topicDetail) {
    $trail->parent('topic_content',$topicDetail->topic_id);
    $trail->push("Add Topic Content", route('createTopicContent'));
});
Breadcrumbs::for('edit_topic_content', function ($trail,$topicDetail) {
    $trail->parent('topic_content',$topicDetail->topic_id);
    $trail->push("Edit  Topic Content", route('editTopicContent',$topicDetail));
});


Breadcrumbs::for('course', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Course", route('courseList'));
});

Breadcrumbs::for('add_course', function ($trail) {
    $trail->parent('course');
    $trail->push("Add Course", route('createCourse'));
});
Breadcrumbs::for('edit_course', function ($trail,$course) {
    $trail->parent('course');
    $trail->push("Edit ".$course->name, route('editTopic',$course));
});

Breadcrumbs::for('onlinecourse', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Online Course", route('onlinecourseList'));
});

Breadcrumbs::for('add_online_course', function ($trail) {
    $trail->parent('onlinecourse');
    $trail->push("Add  Online Course", route('createOnlineCourse'));
});
Breadcrumbs::for('edit_online_course', function ($trail, $course) {
    $trail->parent('onlinecourse');
    $trail->push("Edit  Online Course  ".$course->name, route('editonlineCourse',$course));
});


Breadcrumbs::for('whatsincluded', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Whats Included", route('whatsincludedList'));
});

Breadcrumbs::for('add_whatsincluded', function ($trail) {
    $trail->parent('course');
    $trail->push("Add  Whatsincluded", route('createWhatsIncluded'));
});
Breadcrumbs::for('edit_whatsincluded', function ($trail,$whatsincluded) {
    $trail->parent('whatsincluded');
    $trail->push("Edit", route('editWhatsIncluded',$whatsincluded));
});

Breadcrumbs::for('course_content', function ($trail,$course) {
    $trail->parent('course');
    $trail->push("Course Content ", route('courseContentList',['course'=>$course]));
});


Breadcrumbs::for('add_course_content', function ($trail,$courseDetail) {
    $trail->parent('course_content',$courseDetail->topic_id);
    $trail->push("Add Course Content", route('createTopicContent'));
});
Breadcrumbs::for('edit_course_content', function ($trail,$courseDetail) {
    $trail->parent('course_content',$courseDetail->topic_id);
    $trail->push("Edit  Course Content", route('editTopicContent',$courseDetail));
});


Breadcrumbs::for('bullet_Point', function ($trail,$course) {
    $trail->parent('course');
    $trail->push("Bullet Point ", route('bulletPointList',['course'=>$course]));
});

Breadcrumbs::for('add_bullet_Point', function ($trail,$courseDetail) {
    $trail->parent('bullet_Point',$courseDetail);
    $trail->push("Add Bullet Point");
});
Breadcrumbs::for('edit_bullet_Point', function ($trail,$courseDetail) {
    $trail->parent('bullet_Point',$courseDetail);
    $trail->push("Edit Bullet Point");
});


Breadcrumbs::for('accreditation', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Accreditation", route('accreditationList'));
});

Breadcrumbs::for('add_accreditation', function ($trail) {
    $trail->parent('accreditation');
    $trail->push("Add Accreditation", route('accreditationCreate'));
});
Breadcrumbs::for('edit_accreditation', function ($trail,$accreditation) {
    $trail->parent('accreditation');
    $trail->push("Edit ".$accreditation->name, route('editAccreditation',$accreditation));
});

Breadcrumbs::for('schedule', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Schedule", route('scheduleList'));
});

Breadcrumbs::for('add_schedule', function ($trail) {
    $trail->parent('schedule');
    $trail->push("Add Schedule", route('createSchedule'));
});
Breadcrumbs::for('edit_schedule', function ($trail,$schedule) {
    $trail->parent('schedule');
    $trail->push("Edit ".$schedule->name, route('editSchedule',$schedule));
});


Breadcrumbs::for('manualschedule', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Manual Schedule", route('manualScheduleList'));
});


Breadcrumbs::for('edit_manual_schedule', function ($trail,$schedule) {
    $trail->parent('manualschedule');
    $trail->push("Edit ".$schedule->name, route('editSchedule',$schedule));
});
Breadcrumbs::for('popular_list', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Popular List", route('popularItems'));
});

Breadcrumbs::for('schedule_fetch', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(" Fetch Schedule", route('fetchSchedule'));
});

Breadcrumbs::for('schedule_manage_price', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Manage Course Price", route('manageCoursePrice'));
});


Breadcrumbs::for('schedule_online_price', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Online Price List", route('onlinePriceList'));
});

// Breadcrumbs::for('schedule_online_price', function ($trail) {
//     $trail->parent('dashboard');
//     $trail->push("Online Price List", route('onlinePriceList'));
// });
Breadcrumbs::for('website', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Website Detail List", route('websiteDetailList'));
});

Breadcrumbs::for('add_website', function ($trail) {
    $trail->parent('website');
    $trail->push("Add Website Detail", route('createwebsiteDetail'));
});
Breadcrumbs::for('edit_website', function ($trail,$websitedetail) {
    $trail->parent('website');
    $trail->push("Edit Website Detail ", route('createwebsiteDetail',$websitedetail));
});

Breadcrumbs::for('url_redirect', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Url Redirect List", route('urlRedirectList'));
});

Breadcrumbs::for('add_url', function ($trail) {
    $trail->parent('url_redirect');
    $trail->push("Add Website Detail", route('createwebsiteDetail'));
});
Breadcrumbs::for('edit_url', function ($trail,$url) {
    $trail->parent('url_redirect');
    $trail->push("Edit Website Detail ", route('createwebsiteDetail',$url));
});


Breadcrumbs::for('testimonial', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Testimonial List", route('testimonialList'));
});

Breadcrumbs::for('add_testimonial', function ($trail) {
    $trail->parent('testimonial');
    $trail->push("Add Testimonial", route('createTestimonial'));
});
Breadcrumbs::for('edit_testimonial', function ($trail,$testimonial) {
    $trail->parent('testimonial');
    $trail->push("Edit Testimonial ", route('createTestimonial',$testimonial));
});



Breadcrumbs::for('tag', function ($trail) {
    $trail->parent('dashboard');
    $trail->push("Tag ", route('tagList'));
});
Breadcrumbs::for('edit_tag', function ($trail,$tag) {
    $trail->parent('tag');
    $trail->push("Edit Tag ", route('editTag',$tag));
});
?>