<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\Course;
use App\Http\Requests\cms\CertificationRequest;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::with('courses')->get();
        return view('cms.certification.certificationList',compact('certifications'));
    }
   
    public function courseList()
    {
        $data['courses'] = Course::whereHas('certifications')->with('certifications')->get();
        return view('cms.certification.courses',$data);
    }

    public function create()
    {
        $data['certification'] = new Certification();
        $data['courses']       = Course::pluck('name','id')->toArray();
        $data['submitRoute']   = "insertCertification";
        return view('cms.certification.certificationForm',$data);
    }

    public function insert(CertificationRequest $request)
    {
        $input = $request->except("_token");
        
        $certification = new Certification();
        $certification['name']          = $input['name'];
        $certification['tka_name']      = $input['tka_name'];
        $certification['slug']          = $input['slug'];
        $certification['is_published']  = isset($input['is_published']) ? 1: 0;
        
        $count = Certification::count();
        $certification['position']      = $count + 1;

        $certification->save();
        return redirect()->route('certificationList')->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $data['certification']  = Certification::find($id);
        $data['courses']        = Course::pluck('name','id')->toArray();
        $data['submitRoute']    = array('updateCertification',$id);
        
        return view("cms.certification.certificationForm",$data);
    }

    public function update(CertificationRequest $request)
    {
        $input      = $request->except("_token");
        $courses    = $request->courses;

        $certification      = Certification::find($request->id);
        $certification['name']          = $input['name'];
        $certification['tka_name']      = $input['tka_name'];
        $certification['slug']          = $input['slug'];
        $certification['is_published']  = isset($input['is_published']) ? 1: 0;
        $certification->courses()->sync($courses);
        
        $certification->update();
        return redirect()->route('certificationList')->with('success','Successfully Updated');
    }

    public function delete($id)
    {
        $certification = Certification::find($id);
        
        $certification->delete();

    }

    public function trashList()
    {
        $data['trashedCertifications'] = Certification::onlyTrashed()->get();
        return view('cms.trashed.certificationTrashedList',$data);
    }

    public function restore($id)
    {
        $data = Certification::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }

    public function forceDelete($id)
    {
        $data = Certification::onlyTrashed()->find($id);
        $data->courses()->detach();
        
        $data->forceDelete();
        return back()->with('success','Permanently Deleted');
    }

}
