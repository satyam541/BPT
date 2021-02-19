<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;
use App\Models\Location;
class LocationController extends Controller
{
    public function index(){
        $pageDetail = PageDetail::where(['page_name'=>'locations','section'=>'metas'])->get();
        
    if(!$pageDetail->isEmpty())
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
    // $popular = Popular::locations()->where('country_id', $countryId);
    $popular = Location::where('country_id','gb')->get()->take(4);
    $data['popularLocations'] = $popular;
    $data['locations'] = $locations;
    return view('location',$data);
    }
}
