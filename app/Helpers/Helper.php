<?php

use App\Models\Country;
use App\Models\WebsiteDetail;
use App\Models\Category;
use App\Models\Article;
use App\Models\Schedule;
use App\Http\Controllers\JWTEnquiryController;
use App\Models\Course;
use App\Models\Location;
use App\Models\PageDetail;
use App\Models\CertificationTopic;
use App\Models\Topic;
use App\Models\SocialMedia;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;

if(!function_exists('statsData')){
    function statsData(){
        $data=PageDetail::getContent('stats');
        return $data;
    }
}

if(!function_exists('summernote_replace')){
    function summernote_replace($content){
        foreach($content as $key=>$value)
        {
            $content->$key = str_replace('<p></p>',null,$value);
            $content->$key = str_replace('<p><br></p>',null,$value);
        }
        return $content;
    }
}
if (!function_exists('encodeUrlSlug')) {
    function encodeUrlSlug($string)
    {
        $name = str_replace("&", " and", "$string");
        $name = str_replace("+", " plus", "$name");
        $stringname = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name));
        return $stringname;
    }
    if (!function_exists('country')) {
        function country()
        {

            $activeCountry = Country::getActiveCountry();
            if (empty($activeCountry)) {
                $country_code = Country::getDefault();
                $activeCountry = Country::find($country_code);
                Country::setActiveCountry($activeCountry);
            }
            return Country::getActiveCountry();
        }
    }
    if (!function_exists('countries')) {
        function countries()
        {
            return   Country::where('active', '1')->orderBy('name')->get();
        }
    }
    if (!function_exists('socialmedialinks')) {
        function socialmedialinks()
        {
            return SocialMedia::all();
        }
    }
    if (!function_exists('websiteDetail')) {
        function websiteDetail()
        {
            $selectedDetail = WebsiteDetail::$selected;
            if (empty($selectedDetail)) {
                $selectedDetail = WebsiteDetail::where('country_id', country()->id)->first();
                if (empty($selectedDetail)) {
                    $selectedDetail = WebsiteDetail::first();
                }
                WebsiteDetail::$selected = $selectedDetail;
            }
            return $selectedDetail;
        }
    }
    if (!function_exists('menu_data')) {
        function menu_data()
        {
            $data['categories']     =   Category::has('popular')->has('topics.courses')
                                                    ->select('id', 'name','image','icon', 'display_order', 'published')
                                                    ->where('published', 1)
                                                    ->orderBy('display_order')
                                                    ->limit(8)
                                                    ->get();
            // dd($data['categories']);
            $category_ids           =   $data['categories']->pluck('id')->toArray();
            $data['topics']         =   Topic::has('courses')
                                                    //->has('popular')
                                                    ->select('id', 'name','category_id', 'display_order', 'published')
                                                    ->whereIn('category_id', $category_ids)
                                                    ->where('published', 1)
                                                    ->orderBy('display_order')
                                                    ->orderBy('category_id')
                                                    ->get()
                                                    ->groupBy('category_id');
                                                    
            $data['courses']        =   Course::has('topic.category')->select('id', 'name', 'topic_id','display_order', 'reference')
                                                    ->whereHas('topic.category', function($query) use($category_ids)
                                                    {
                                                        $query->whereIn('category_id', $category_ids);
                                                    })
                                                    ->orderBy('display_order')
                                                    ->orderBy('topic_id')
                                                    ->get()
                                                    ->groupBy('topic_id');
            return $data;
            
        }
    }
    if (!function_exists('capitalizeName')) {
        function capitalizeName($string)
        {
            $string = explode(" ", $string);
            $newString = array();
            foreach ($string as $str) {
                $newString[] = Str::ucfirst($str);
            }
            return implode(" ", $newString);
        }
    }
    if (!function_exists('footer')){
        function footer(){

            $selectedDetail = PageDetail::$selected;
            if (empty($selectedDetail)) {
                $selectedDetail = PageDetail::getContent('home');
                PageDetail::$selected = $selectedDetail;
            }
            return $selectedDetail;
        }
    }
    if (!function_exists('cart')) {
        function cart()
        {

            $cartItems = Cart::content();


            return $cartItems;
        }
    }
    if (!function_exists('metaData')) {

        function metaData($data)
        {
            static $metaData = [
                'title' => 'Best Practice Training Courses | Best Practice Training',
                'description' => 'Study our professional Best Practice Training courses today delivered by expert trainers in the industry.',
                'keyword' => 'Best Practice Training Courses, Best Practice Training'
            ];
            if (is_array($data)) {
                $metaData = $data;
                return $metaData;
            } elseif (is_string($data)) {
                return replaceVar($metaData[$data]);
            }
            return '';
        }
    }
    if (!function_exists('blogs')) {
        function blogs()
        {
            $blogs = Article::where(['type' => 'blog'])->orderBy('post_date', 'desc')->get();
            return $blogs;
        }
    }
    if (!function_exists('courses')) {
        function courses()
        {
            $courses = Course::all();
            return $courses;
        }
    }
    if (!function_exists('formatPrice')) {
        function formatPrice($price, $decimals = 0, $decimalSeparator = null, $thousandSeparator = null)
        {
            return number_format($price, $decimals, $decimalSeparator, $thousandSeparator);
        }
    }

    if (!function_exists('storeSelected')) {
        function storeSelected($data)
        {
            $string = empty(json_decode(session('selectedFilter'))->$data) ? null : json_decode(session('selectedFilter'))->$data;
            return $string;
        }
    }
    if (!function_exists('storeFilterData')) {
        function storeFilterData($data)
        {
            $courses = Course::orderBy('topic_id')->where('display_order', '!=', 99)->orderByRaw('display_order')->get();
            $locations = Location::all();
            static $savedData = [
                "deliveryMethod" =>  [
                    "Classroom" => '#classroom-booking',
                    "Virtual" => '#virtual-booking',
                    "Online" => '#online-booking',
                    "Onsite" => '#onsite-booking'
                ],
            ];
            if (empty($savedData[$data])) {
                switch ($data) {
                    case "courses":
                        $savedData[$data] = $courses;
                        return $courses;
                        break;
                    case "locations":
                        $savedData[$data] = $locations;
                        return $locations;
                        break;
                    case "deliveryMethod":
                        return  [
                            "Classroom" => '#classroom-booking',
                            "Virtual" => '#virtual-booking',
                            "Online" => '#online-booking',
                            "Onsite" => '#onsite-booking'
                        ];
                        break;
                }
            } else {
                return $savedData[$data];
            }
        }
    }

    if (!function_exists('storeVar')) {
        function storeVar($data)
        {
            static $savedData = array();
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $savedData[$key] = $value;
                }
                return $savedData;
            } else {
                if (empty($savedData[$data])) {
                    switch ($data) {
                        case "countryname":
                            return country()->name;
                            break;
                        case "cc":
                            return country()->country_code;
                            break;
                    }
                } else {
                    return $savedData[$data];
                }
            }
        }
    }

    if (!function_exists('replaceVar')) {
        function replaceVar($content)
        {
            $country_name = storeVar('countryname');
            $country_code = storeVar('cc');
            $content = str_replace('{countryname}', $country_name, $content);
            $content = str_replace('{cc}', $country_code, $content);
            return $content;
        }
    }

    if (!function_exists('MakeJWTEnquiry')) {
        function MakeJWTEnquiry($input = array())
        {
            $JWT = new JWTEnquiryController;
            if (isset($input['type'])) {
                if (Str::contains($input['type'], "onsite"))
                    $JWT->make_enquiry($input, 6);
                else if (Str::contains($input['type'], "course"))
                    $JWT->make_enquiry($input, 2);
                else if (Str::contains($input['type'], "online"))
                    $JWT->make_enquiry($input, 56);
                else if (Str::contains($input['type'], "topic"))
                    $JWT->make_enquiry($input, 39);
                else if (Str::contains($input['type'], "contact"))
                    $JWT->make_enquiry($input, 1);
                else if (Str::contains($input['type'], "top"))
                    $JWT->make_enquiry($input, 4);
                else if (Str::contains($input['type'], "other"))
                    $JWT->make_enquiry($input, 7);
                else if (Str::contains($input['type'], "search"))
                    $JWT->make_enquiry($input, 5);
                else if (Str::contains($input['type'], "client"))
                    $JWT->make_enquiry($input, 94);
                else if (Str::contains($input['type'], "landingpage"))
                    $JWT->make_enquiry($input, 276);
                else if (Str::contains($input['type'], "Jobsite"))
                    $JWT->make_enquiry($input, 44);
                else if (Str::contains($input['type'], "booking"))
                    $JWT->make_order_enquiry($input, 12);
                else if (Str::contains($input['type'], "success"))
                    $JWT->make_order_enquiry($input, 93);
                else if (Str::contains($input['type'], "declined"))
                    $JWT->make_order_enquiry($input, 11);
                else if (Str::contains($input['type'], "incomplete"))
                    $JWT->make_order_enquiry($input, 10);
                else if (Str::contains($input['type'], "knowledgepass"))
                $JWT->make_enquiry($input, 73);
                else if (Str::contains($input['type'], "bundle"))
                $JWT->make_enquiry($input, 67);

                else
                    $JWT->make_enquiry($input);
            }
        }
    }
}


if(!function_exists('heading_split'))
{

    function heading_split($str)
    {
       
        $name = explode(" ", $str);
        $position=(count($name)/2);
        $position=ceil($position);
        if ($position > 2) {

            $position= $position+1;
        }
        $array = array_chunk($name,$position);
        $ar1=implode(" ",$array[0]);
        $ar2=implode(" ",$array[1]);
        $ar2 ="<span>".$ar2."</span>";
        $final=$ar1." ".$ar2;
        return $final;   
        
    }
}

if (!function_exists('unlinkedTopic')) {
    function unlinkedTopic()
    {
        $unlinkedCourse = Topic::whereDoesntHave('category')->count();
        return $unlinkedCourse;
    }
}

if (!function_exists('unlinkedCourse')) {
    function unlinkedCourse()
    {
        $unlinkedCourse = Course::whereDoesntHave('topic')->count();
        return $unlinkedCourse;
    }
}

if (!function_exists('unlinkedCertificationTopic')) {
    function unlinkedCertificationTopic()
    {
        $unlinkedCourse = CertificationTopic::whereDoesntHave('certification')->count();
        return $unlinkedCourse;
    }
}

if (!function_exists('convertPrice')) {
    function convertPrice($price)
    {
        $exchangerate = country()->exchange_rate;
        $price = $price * $exchangerate;
        return ceil(number_format($price,2,'.',''));
    }
}