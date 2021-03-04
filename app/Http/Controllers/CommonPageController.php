<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;

class CommonPageController extends Controller
{
    public function index(Request $request){
        $route = $request->route()->action['as'];
            
        switch ($route) {
            case 'privacy-policy':
             return    $this->content('privacy_policy');
            case 'cookies':
            return   $this->content('cookies');
            case 'third-party':
            return    $this->content('third_party');
            case 'terms-and-conditions':
            return   $this->content('terms_and_condition');
            default:
               
                break;
    }
    
}
public function content($pageName)
    {

        $pageDetail = PageDetail::where(['page_name'=>$pageName,'section'=>'meta'])->get();
        if(!$pageDetail->isEmpty())
        {
            $meta['title'] = $pageDetail->where('sub_section','title')->first()->heading;
            $meta['description'] = $pageDetail->where('sub_section','description')->first()->heading;
            $meta['keyword'] = $pageDetail->where('sub_section','keyword')->first()->heading; 
            metaData($meta);
        }
      
        $data['pageDetail'] = PageDetail::getContent($pageName);       
        // dd($data['pageDetail']);
        return view('static',$data);
    }

}
