<?php

namespace App\Http\Controllers\cms;

use App\Models\Bundle;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\cms\BundleRequest;

class BundleController extends Controller
{
    public function index()
    {
        $data['data'] = Bundle::with('courses')->get();
        return view('cms.bundle.bundles',$data);
    }

    public function create()
    {
        $data['result']         = new Bundle();
        $data['courses']        = Course::pluck('name','id')->toArray();
        $data['submitRoute']    = 'insertBundle';
        return view('cms.bundle.bundleForm',$data);
    }

    public function store(BundleRequest $request)
    {
        $inputs             = $request->except("_token");
        $data['name']       = $inputs['name'];
        $data['price']      = $inputs['price'];
        $data['published']  = isset($inputs['published']);
        $courses = $request->courses; 
        
        $bundle = Bundle::updateOrCreate(['id' =>$inputs['id']],$data);
        $bundle->courses()->sync($courses);

        return redirect()->route('bundleList')->with('success','Operation Done!');
    }

    public function edit($id)
    {
        $data['result']         = Bundle::with('courses')->find($id);
        $data['courses']        = Course::pluck('name','id')->toArray();
        $data['submitRoute']    = ['updateBundle',$id];
        return view('cms.bundle.bundleForm',$data);
    }

    public function delete($id)
    {
        Bundle::find($id)->delete();
    }

    public function trashList()
    {
        $data['trashBundles'] = Bundle::onlyTrashed()->get();
        return view('cms.trashed.bundleTrashedList',$data);
    }
    
    public function restore($id)
    {
        $bundle = Bundle::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }

    public function forceDelete($id)
    {
        Bundle::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Permanently Deleted');
    }
}
