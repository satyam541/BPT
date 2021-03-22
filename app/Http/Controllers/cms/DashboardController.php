<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Location;
use App\Models\Order;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
     public function list()
     {
      $data['total_courses']	=	Course::all()->count();
   
      $data['total_enquiries']	=	Enquiry::all()->count();
      $data['total_locations']	=	Location::all()->count();
      $data['total_orders']	=	Order::all()->count();
        return view('cms.dashboard',$data);
     }
     public function  ImageUpload(Request $request)
     {
         
          $imageName = "UploadedImage".Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
          $request->file('image')->move(public_path("/uploads/editor/"),$imageName);
           return '/uploads/editor/'.$imageName;
     }
}
