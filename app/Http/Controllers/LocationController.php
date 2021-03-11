<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;
use App\Models\Location;
use App\Models\Popular;
class LocationController extends Controller
{
    public function index(){

        $pageDetail = PageDetail::where(['page_name'=>'locations','section'=>'metas'])->get();
        
        if($pageDetail->isNotEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keywords')->first()->heading; 
            metaData($meta);
        }
        $data['pageDetail'] = PageDetail::getContent('locations');    
        $country = country();
        $countryId = country()->id;
        $locations = $country->locations;
        $popular = Popular::locations()->where('country_id', $countryId)->take('6');
        $data['popularLocations'] = $popular;
        $data['locations'] = $locations;
        return view('location',$data);

    }
    
    public function detail(Request $request)
    {
        $location = $request->route('location');
        
        $location = Location::where('reference', $location)->first();
        if(empty($location))
        {
            return redirect()->action('LocationController@index');
        }
        $data['description'] = $location->meta_description;
        $data['keyword'] = $location->meta_keywords; 
        $data['title'] = $location->meta_title; 

        metaData($data);
        $data['pageDetail'] = PageDetail::getContent('location_detail');  
        $data['location']=$location;
        return view('location-detail',$data);

       
    
    }
}
