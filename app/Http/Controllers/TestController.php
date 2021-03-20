<?php

namespace App\Http\Controllers;


use App\Models\Faq;
use App\Models\Category;
use App\Models\BulletPoint;
use App\Models\whatsIncluded;
use App\Models\CategoryContent;
use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\Location;
use App\Models\ModuleResource;
use App\Models\OnlineCoursePrice;
use App\Models\Popular;
use App\Models\Resource;
use App\Models\Topic;
use App\Models\TopicContent;
use App\Models\whatsIncludedHeaders;
use App\UrlIssue;

class TestController extends Controller
{
    public function index()
    {
      
        dd('please uncomment!!');
        ini_set('max_execution_time',-1);
        $url = "http://127.0.0.1:8000/api/category";
        $data = file_get_contents($url);
            
            $data = json_decode((string) $data);

            $bulkData = collect($data);
            // dd($bulkData->pluck( 'courseId','courseDisplayName'));
            foreach ($bulkData as $key => $data) {
                $this->category($data);
            }

        $categories = Category::all();
        foreach($categories as $category)
        {
            $id = $category->id;
            
            $url = "http://127.0.0.1:8000/api/topic/$id";
            $data = file_get_contents($url);
            // dd($url, $data);
            $data = json_decode((string) $data);

            $bulkData = collect($data);
            // dd($bulkData);
            foreach ($bulkData as $key => $data) {
                $this->topic($data);
            }
        }

        $topics  = Topic::all();
        foreach($topics as $topic)
        {
            $id = $topic->id;
            
            $url = "http://127.0.0.1:8000/api/course/$id";
            $data = file_get_contents($url);
            if(empty($data))
                continue;
            $data = json_decode((string) $data);

            $bulkData = collect($data);
            // dd($bulkData);
            foreach ($bulkData as $key => $data) {
                $this->course($data);
            }
        }
        
        dd('arey o pARAM SIR DATA DAAL DIYA HAMNEY');

    }
    public function category($data)
    {
        // dd($data);
        $category                = new Category(); 
        $category->id            = $data->courseId; 
        $category->name          = $data->courseDisplayName; 
        $category->image         = $data->courseLogo; 
        $category->tag_line      = $data->courseTagLine; 
        $category->reference     = $data->slug; 
        $category->display_order = $data->position; 
        $category->published     = $data->isPublished; 
        if ($data->courseType == 'Online') {
            $category->is_online     = 1; 
        }
        $category->save();
        $this->catContent($data,$category);
        $this->faq($data,$category,'category');
        $this->bp($data,$category,'category');
        $this->wi($data,$category,'category');
        $this->resources($data,$category,'category');
        if (!empty($data->popular_courses)) {
            // dd($data, 'cat');
            $this->addPopular($data->popular_courses, 'category');
        }
    }
    public function catContent($data, $category)
    {
        $categoryContent = new CategoryContent(); 
        $categoryContent->category_id            = $category->id; 
        $categoryContent->country_id             = 'gb'; 
        $categoryContent->summary                = $data->courseContent; 
        $categoryContent->detail                 = $data->courseIntro; 
        $categoryContent->overview               = $data->courseOverview; 
        $categoryContent->whats_included         = $data->courseWhatsIncluded; 
        $categoryContent->pre_requities          = $data->coursePreRequities; 
        $categoryContent->who_should_attend      = $data->courseWhoShouldAttend; 
        $categoryContent->what_will_you_learn    = $data->courseWhatWillYouLearn; 
        $categoryContent->meta_title             = $data->courseMetaTitle; 
        $categoryContent->meta_keywords          = $data->courseMetaKeyword; 
        $categoryContent->meta_description       = $data->courseMetaDesc; 
        $categoryContent->save();
    }

    public function topic($data)
    {
        $topic                = new Topic(); 
        $topic->id            = $data->courseId; 
        $topic->category_id   = $data->parentCourseId; 
        $topic->name          = $data->courseDisplayName; 
        $topic->image         = $data->courseLogo; 
        $topic->tag_line      = $data->courseTagLine; 
        $topic->reference     = $data->slug; 
        $topic->display_order = $data->position; 
        $topic->published     = $data->isPublished; 
        if ($data->courseType == 'Online') {
            $topic->is_online     = 1; 
        }
        $topic->save();
        $this->topicContent($data,$topic);
        $this->faq($data,$topic,'topic');
        $this->bp($data,$topic,'topic');
        if (!empty($data->course_whats_included)) {
            $this->wi($data,$topic,'topic');
        }
        $this->resources($data,$topic,'topic');
        if (!empty($data->popular_courses)) {
            // dd($data, 'top');
            $this->addPopular($data->popular_courses, 'topic');
        }
    }



    public function topicContent($data, $topic)
    {
        $topicContent = new TopicContent(); 
        $topicContent->topic_id               = $topic->id; 
        $topicContent->country_id             = 'gb'; 
        $topicContent->summary                = $data->courseContent; 
        $topicContent->detail                 = $data->courseIntro; 
        $topicContent->overview               = $data->courseOverview; 
        $topicContent->whats_included         = $data->courseWhatsIncluded; 
        $topicContent->pre_requities          = $data->coursePreRequities; 
        $topicContent->who_should_attend      = $data->courseWhoShouldAttend; 
        $topicContent->what_will_you_learn    = $data->courseWhatWillYouLearn; 
        $topicContent->meta_title             = $data->courseMetaTitle; 
        $topicContent->meta_keywords          = $data->courseMetaKeyword; 
        $topicContent->meta_description       = $data->courseMetaDesc; 
        $topicContent->save();
    }

    public function course($data)
    {
        $course                = new Course(); 
        $course->id            = $data->courseId; 
        $course->topic_id      = $data->parentCourseId; 
        $course->name          = $data->courseDisplayName; 
        $course->tka_name      = $data->courseName; 
        $course->image         = $data->courseLogo; 
        $course->tag_line      = $data->courseTagLine; 
        $course->reference     = $data->slug; 
        $course->display_order = $data->position; 
        $course->published     = $data->isPublished; 
        if ($data->courseType == 'Online') {
            $course->is_online     = 1; 
            $this->onlineCoursePrice($data);
        }
        $course->save();
        $this->courseContent($data,$course);
        $this->faq($data,$course,'course');
        $this->bp($data,$course,'course');
        $this->wi($data,$course,'course');
        $this->resources($data,$course,'course');
        if (!empty($data->popular_courses)) {
            // dd($data, 'cour');
            $this->addPopular($data->popular_courses, 'course');
        }
    }
    public function courseContent($data, $course)
    {
        $courseContent = new CourseContent(); 
        // $courseContent->course_id               = $course->id; 
        $courseContent->course_id               = $course; 
        $courseContent->country_id             = 'gb'; 
        $courseContent->summary                = $data->courseContent; 
        $courseContent->detail                 = $data->courseIntro; 
        $courseContent->overview               = $data->courseOverview; 
        $courseContent->whats_included         = $data->courseWhatsIncluded; 
        $courseContent->pre_requities          = $data->coursePreRequities; 
        $courseContent->who_should_attend      = $data->courseWhoShouldAttend; 
        $courseContent->what_will_you_learn    = $data->courseWhatWillYouLearn; 
        $courseContent->meta_title             = $data->courseMetaTitle; 
        $courseContent->meta_keywords          = $data->courseMetaKeyword; 
        $courseContent->meta_description       = $data->courseMetaDesc; 
        $courseContent->save();
    }
    public function onlineCoursePrice($data)
    {
        if (!empty($data->coursePrice)) {
            $onlinePrice = new OnlineCoursePrice();
            $onlinePrice->course_id = $data->courseId;
            $onlinePrice->type = $data->courseIncrementType;
            $onlinePrice->component = 'Basic';
            $onlinePrice->price = $data->coursePrice;
            $onlinePrice->save();
        }
    }
    public function faq($data, $module, $type)
    {
        foreach ($data->course_faq as $faq) {
            $categoryFaq = new Faq();
            $categoryFaq->id            = $faq->faqId;
            $categoryFaq->module_id     = $module->id;
            $categoryFaq->module_type   = $type;
            $categoryFaq->question      = $faq->faqQuestion;
            $categoryFaq->answer        = $faq->faqAnswer;
            $categoryFaq->display_order = $faq->faqSortOrder;
            $categoryFaq->save();
        }
    }
    public function bp($data, $module, $type)
    {
        foreach ($data->course_bullet_point as $bulletPoint) {
            $categoryBulletPoint = new BulletPoint();
            $categoryBulletPoint->id = $bulletPoint->bulletPointId;
            $categoryBulletPoint->module_id = $module->id;
            $categoryBulletPoint->module_type = $type;
            $categoryBulletPoint->bullet_point_text = $bulletPoint->bulletPointText;
            $categoryBulletPoint->display_order = $bulletPoint->bulletPointSortOrder;
            $categoryBulletPoint->save();
        }
    }
    public function wi($data, $module, $type)
    {
        foreach ($data->course_whats_included as $wi) {
            whatsIncludedHeaders::firstOrCreate(
                ['id'=>$wi->whatsIncludedId],
                [
                    'name'=>$wi->whatsIncludedText,
                    'icon'=>$wi->whatsIncludedIconPath,
                    // 'content' => $wi->whatsIncludedDescription
                ]
            );
        }

        foreach ($data->course_whats_included as $wi) {
            $categoryWI = new whatsIncluded();
            $categoryWI->module_id   = $module->id;
            $categoryWI->module_type = $type;
            $categoryWI->header_id = $wi->pivot->fk_whatsIncludedId;
            $categoryWI->save();
        }
    }

    public function resources($data, $module, $type)
    {
        foreach ($data->course_resources as $resource) {
            Resource::firstOrCreate(
                ['id'=>$resource->resourceId],
                [
                    'name'          =>$resource->resourceName,
                    'content'       => $resource->resourceContent,
                    'refernce'      => $resource->resourceUrl,
                    'meta_title'    => $resource->resourceMetaTitle,
                    'meta_desc'     => $resource->resourceMetaDesc,
                    'meta_keyword'  => $resource->resourceMetaKeyword,
                ]
            );
        }

        foreach ($data->course_resources as $resource) {
            $resource = new ModuleResource();
            $resource->module_id = $module->id;
            $resource->module_type = $type;
            $resource->resource_id = $resource->resourceId;
            $resource->save();
        }
    }
 
    public function addPopular($data, $type)
    {
        foreach ($data as $key => $popularData) {
            $popular = new Popular();
            $popular->module_type   = $type; 
            $popular->module_id     = $popularData->fk_courseID; 
            $popular->country_id    = $popularData->fk_countryID; 
            $popular->display_order = $popularData->displayOrder; 
            $popular->save(); 
        }
        
    }

    public function locations()
    {
        dd('uncomment code.');
        $url = "http://127.0.0.1:8000/api/locations";
        $data = file_get_contents($url);
        $data = json_decode((string) $data);

        $bulkData = collect($data);

        foreach ($bulkData as $key => $data) {
            $this->addLocations($data);
        }

        dd('locations pai gaiya');

    }

    public function addLocations($data)
    {
        
        $location                   = new Location();
        $location->id               = $data->venueId;
        $location->name             = $data->venueName;
        $location->address          = $data->address;
        $location->reference        = $data->slug;
        $location->country_id       = $data->fk_countryId;
        $location->phone            = $data->phone;
        $location->email            = $data->email;
        $location->image            = $data->venueImageUrl;
        $location->longitude        = $data->longitude;
        $location->latitude         = $data->latitude;
        // $location->intro            = $data->venueIntro;
        $location->description     = $data->venueDescription;
        $location->meta_title       = $data->venueMetaTitle;
        $location->meta_description = $data->venueMetaDesc;
        $location->meta_keywords    = $data->venueMetaKeywords;
        $location->display_order    = $data->displayOrder;
        $location->save();

        if (!empty($data->popular_venues)) {
            $this->popularLocation($data->popular_venues);
        }

    }

    public function popularLocation($data)
    {
            $popular = new Popular();
            $popular->module_type   = 'location'; 
            $popular->module_id     = $data->fk_venueID; 
            $popular->country_id    = $data->fk_countryID; 
            $popular->display_order = $data->displayOrder; 
            $popular->save(); 
    }

    public function bundle()
    {
        dd('uncomment code.');
        $url = "http://127.0.0.1:8000/api/bundle";
        $data = file_get_contents($url);
        $data = json_decode((string) $data);

        $bulkData = collect($data);

        foreach ($bulkData as $key => $data) {
            $this->addBundle($data);
        }

        $bundles = Bundle::all();
        // dd($bundles);
        foreach($bundles as $bundle)
        {
            $id = $bundle->id;
            
            $url = "http://127.0.0.1:8000/api/bundle/$id";
            $data = file_get_contents($url);
            // dd($url, $data);
            $data = json_decode((string) $data);

            $bulkData = collect($data);
            // dd($bulkData);
            foreach ($bulkData as $key => $data) {
                $this->bundleCourse($data, $id);
            }
        }

        dd('bundle pai gaiya');
    }

    public function addBundle($bundle)
    {
        $bundle_new = Bundle::firstOrCreate(
            ['id'=> $bundle->courseId],
            [
                'name'          => $bundle->courseName,
                'price'         => $bundle->coursePrice,
                'display_order' => $bundle->position,
                'published'     => $bundle->isPublished,
            ]
        );
        $bundle_new->id = $bundle->courseId;
        $bundle_new->save();
        // dd($bundle, $bundle_new);
        
    }

    public function bundleCourse($courses, $bundleId)
    {
        $courseId = $courses->courseId;
        $bundle = Bundle::find($bundleId);
        $bundle->courses()->syncWithoutDetaching(['course_id'=> $courseId]);

    }


    public function countryLocations()
    {
        dd('please uncomment!!');
        ini_set('max_execution_time',-1);
        $countries = Country::all();
        
        foreach ($countries as $country) {
            // dd($country->country_code);
            $url = "http://127.0.0.1:8000/api/locations/".$country->country_code;
            $data = file_get_contents($url);
            $data = json_decode($data);
            
            if (empty($data)) {
                continue;
            }
            
            $this->saveCountryLocations($data);
           
        }
    }

    public function saveCountryLocations( $data)
    {
        foreach ($data as $location) {
            // dd($location);
            $display_order = Location::where('country_id', $location->country_id)->max('display_order');
           
            if(empty($display_order)){
                $display_order  = 0;
            }
            Location::updateOrCreate(
                ['country_id'=>$location->country_id,
                'reference'=>$location->reference
                 
                 
                ],
                [
                    'name'=>$location->name,
                    'phone'=>$location->venue->phone,
                    'email'=>$location->venue->email,
                    'image'=>$location->venue->image,
                    'longitude'=>$location->venue->longitude,
                    'latitude'=>$location->venue->latitude,
                    'intro'=>$location->venue->introduction,
                    'description'=>$location->venue->description,
                    'inherit_schedule'=>$location->inherit_schedule,
                    'fetch_schedule'=>$location->fetch_schedule,
                    'meta_title'=>$location->venue->meta_title,
                    'meta_description'=>$location->venue->meta_description,
                    'meta_keywords'=>$location->meta_keywords,
                    'display_order'=>$display_order+1
                ]
            );
        }
        
        
    }

    public function country()
    {
        ini_set('max_execution_time',-1);
        $countries = Country::where('country_code', '<>' ,'gb')->get();
        
        foreach ($countries as $country) {
            dd($country->country_code);
            $url = "http://127.0.0.1:8000/api/locations/".$country->country_code;
            $data = file_get_contents($url);
            $data = json_decode($data);
            
            if (empty($data)) {
                continue;
            }
            
            $this->saveCountry($data);
           
        }
    }

    public function saveCountry($data)
    {
        foreach ($data as $country) {
            // dd($country);
           
            $main = Country::find($country->country_code);
                                
            $main->currency =   $country->currency;  
            $main->currency_symbol =   $country->currency_symbol;  
            $main->currency_symbol_html =   $country->currency_symbol_html;  
            $main->currency_title =   $country->currency_title;  
            $main->charge_vat =   $country->charge_vat;  
            $main->sales_tax_label =   $country->sales_tax_label;  
            $main->sales_ratio =   $country->sales_ratio;  
            $main->vat_percentage =   $country->vat_percentage;  
            $main->update();

            
        }
    }

    public function dump()
    {
        $data = file_get_contents('http://127.0.0.1:8010/api/dump');
        $data = json_decode($data);
        // dd($data);
        $changedSlug = array();
        $changedParent = array();
        $missing = array();
        foreach ($data->course as $course) {
            $cat = Course::find($course->id);
            if(empty($cat))
            {
                $missing[] = $course->id;
                continue;
            }
            if($course->topic_id != $cat->topic_id)
            {
                $changedParent[$course->id] = ['old'=>$cat->topic_id,'new'=>$course->topic_id];
                $cat->topic_id = $course->topic_id;
                $cat->update();
            }
            if($course->reference != $cat->reference)
            {
                $changedSlug[$course->id] = ['old'=>$cat->reference,'new'=>$course->reference];
                $cat->reference = $course->reference;
                $cat->update();
            }
        }
        print_r($changedSlug);
        print_r($changedParent);
        print_r($missing);
        dd($changedSlug);
    }



    public function missingCourse()
    {
        $courseData= file_get_contents('http://127.0.0.1:8000/api/dump');
        $courseData = json_decode($courseData);
        foreach($courseData as $data)
        {
            $course                = new Course(); 
            $course->id            = $data->courseId; 
            $course->topic_id      = $data->parentCourseId; 
            $course->name          = $data->courseDisplayName; 
            $course->tka_name      = $data->courseName; 
            $course->image         = $data->courseLogo; 
            $course->tag_line      = $data->courseTagLine; 
            $course->reference     = $data->slug; 
            $course->display_order = $data->position; 
            $course->published     = $data->isPublished; 
            $course->save();
        }
        dd('done');
    }

    public function missingContent()
    {
        $courses = Course::doesNtHave('content')->get()->pluck('id')->toArray();
        dd($courses);
        // $contents = TopicContent::whereIn('topic_id', $courses)->get();
        $contents= file_get_contents('http://127.0.0.1:8020/api/dump'); 
        $contents = json_decode($contents);
        
        
        foreach($contents as $content)
        {
            // dd($content, $courses);
            if (in_array($content->courseId, $courses)) {
                // $this->missingCourseContent($content,$content->courseId);
                $this->courseContent($content,$content->courseId);
            }
            
        }
        
    }
    public function missingCourseContent($data, $course)
    {
        $courseContent = new CourseContent(); 
        // $courseContent->course_id               = $course->id; 
        $courseContent->course_id               = $course; 
        $courseContent->country_id             = 'gb'; 
        $courseContent->summary                = $data->summary; 
        $courseContent->detail                 = $data->detail; 
        $courseContent->overview               = $data->overview; 
        $courseContent->whats_included         = $data->whats_included; 
        $courseContent->pre_requities          = $data->pre_requities; 
        $courseContent->who_should_attend      = $data->who_should_attend; 
        $courseContent->what_will_you_learn    = $data->what_will_you_learn; 
        $courseContent->meta_title             = $data->meta_title; 
        $courseContent->meta_keywords          = $data->meta_keywords; 
        $courseContent->meta_description       = $data->meta_description; 
        $courseContent->save();
    }


    public function refernceMatch()
    {
        ini_set('max_execution_time',-1);
        $categories = Category::pluck('reference','id')->toArray();
        // dd($data);
        foreach ($categories as $category => $reference) {
            $categoriesData = file_get_contents('http://127.0.0.1:8020/api/dump/'.$category);
            $categoriesData = json_decode($categoriesData);
            // dd($categoriesData, $category,$reference);
            $fullReference = 'training-courses/'.$reference;
            if(empty($categoriesData)){
                continue;
            }
            if($fullReference != $categoriesData->slug){
                $url = new UrlIssue();
                $url->old_url = $categoriesData->slug;
                $url->new_url = $fullReference;
                $url->type = 'category';
                $url->save();
            }

        }
        $topics = Topic::where('published',1)->pluck('reference','id')->toArray();
        foreach ($topics as $topic => $reference) {
            $topicsData = file_get_contents('http://127.0.0.1:8020/api/dump/'.$topic);
            $topicsData = json_decode($topicsData);
            $fullReference = 'training-courses/'.$reference;
            if(empty($topicsData)){
                continue;
            }
            if($fullReference != $topicsData->slug){
                $url = new UrlIssue();
                $url->old_url = $topicsData->slug;
                $url->new_url = $fullReference;
                $url->type = 'topic';
                $url->save();
            }
        }
        $courses = Course::where('published',1)->pluck('reference','id')->toArray();
        foreach ($courses as $course => $reference) {
            $coursesData = file_get_contents('http://127.0.0.1:8020/api/dump/'.$course);
            $coursesData = json_decode($coursesData);
            $fullReference = 'training-courses/'.$reference;
            if(empty($coursesData)){
                continue;
            }
            if($fullReference != $coursesData->slug){
                $url = new UrlIssue();
                $url->old_url = $coursesData->slug;
                $url->new_url = $fullReference;
                $url->type = 'course';
                $url->save();
            }
        }
        dd('done');
         
    }
      

}
