<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\Course;
use App\Models\CertificationTopic;
use App\Http\Requests\cms\CertificationRequest;
use App\Http\Requests\cms\CertificationTopicRequest;
use Carbon\Carbon;
class CertificationController extends Controller
{
    private $Image_prefix;
    private $Icon_prefix;

    public function __construct()
    {
        $this->Image_prefix = "certificationImage";
        $this->Icon_prefix  = "certificationIcon";
		// $this->middleware('access:role,insert')->only('insertRole');
    }
    public function index()
    {
        $certifications = Certification::all();
        return view('cms.certification.certificationList',compact('certifications'));
    }
   
    public function topicList()
    {
        $data['topics'] = CertificationTopic::with('certification')->get();
        
        return view('cms.certification.topics',$data);
    }

    public function unlinkedTopic()
    {
        $data['topics']          = CertificationTopic::whereDoesntHave('certification')->get();
        $data['certification']   = Certification::pluck('name','id');
        return view('cms.certification.unlinkedTopics',$data);
    }

    public function linkCertification($id, Request $request)
    {
        $topic = CertificationTopic::find($id);
        $topic['certification_id'] = $request['certification_id']; 
        $topic->update();
        return back()->with('success','Certification linked');
    }

    public function create()
    {
        $data['certification'] = new Certification();
        
        $data['submitRoute']   = "insertCertification";
        return view('cms.certification.certificationForm',$data);
    }

    public function insert(CertificationRequest $request)
    {
        $input = $request->except("_token");
        
        $certification = new Certification();
        $certification['name']          = $input['name'];
        $certification['tka_name']      = $input['tka_name'];
        $certification['slug']          = encodeUrlSlug($input['slug']);
        $certification['is_published']  = isset($input['is_published']) ? 1: 0;
        
        $count = Certification::count();
        $certification['position']      = $count + 1;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($certification->image_path), $imageName);
            $certification->image = $imageName;
        }

        if($request->hasFile('icon')){
            $imageName = $this->Icon_prefix.Carbon::now()->timestamp.'.'.$request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path($certification->icon_path), $imageName);
            $certification->icon = $imageName;
        }
        $certification->save();
        return redirect()->route('certificationList')->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $data['certification']  = Certification::find($id);
        
        $data['submitRoute']    = array('updateCertification',$id);
        
        return view("cms.certification.certificationForm",$data);
    }

    public function update(CertificationRequest $request)
    {
        $input      = $request->except("_token");
       
        $certification      = Certification::find($request->id);
        $certification['name']          = $input['name'];
        $certification['tka_name']      = $input['tka_name'];
        $certification['slug']          = encodeUrlSlug($input['slug']);
        $certification['is_published']  = isset($input['is_published']) ? 1: 0;
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($certification->image_path), $imageName);
            $certification->image = $imageName;
        }

        if($request->hasFile('icon')){
            $imageName = $this->Icon_prefix.Carbon::now()->timestamp.'.'.$request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path($certification->icon_path), $imageName);
            $certification->icon = $imageName;
        }
        $certification->update();
        return redirect()->route('certificationList')->with('success','Successfully Updated');
    }

    public function assignCourseForm($topic_id)
    {
        $data['courses']    =   Course::pluck('name','id');
        $data['topic']      =   CertificationTopic::find($topic_id);
        $data['submitRoute']= ['assignCoursesRoute','topic_id'=>$topic_id];
        return view('cms.certification.assignCourseForm',$data);
    }

    public function assignCourses(Request $request)
    {
        // dd($request->except('_token'));
        $topic = CertificationTopic::find($request->id);
        $topic->courses()->sync($request->courses);
        return redirect()->route('certificationTopicList')->with('success','Courses Assigned');
    }

    public function addTopic()
    {
        $data['topic'] = new CertificationTopic();
        $data['certifications'] = Certification::pluck('name','id');
        $data['submitRoute']    = 'certificationTopicInsert';
        return view('cms.certification.topicForm',$data);
    }

    public function insertTopic(CertificationTopicRequest $request)
    {
        // dd($request->all());
        $inputs = $request->except('_token');
        $topic  = new CertificationTopic();
        $topic['name']    = $inputs['name'];
        $topic['detail']  = $inputs['detail'];
        $topic['certification_id'] = $inputs['certification_id'];
        $topic->save();
        return redirect()->route('certificationTopicList')->with('success','Successfully Added');
    }
    
    public function editTopic($id)
    {
        $data['topic']       = CertificationTopic::find($id);
        $data['certifications'] = Certification::pluck('name','id');
        $data['submitRoute'] = ['certificationTopicEdit','id'=>$id];
        return view('cms.certification.topicForm',$data);
    }

    public function updateTopic(CertificationTopicRequest $request)
    {
        $topic = CertificationTopic::find($request->id);
        $topic['name']   = $request['name'];
        $topic['detail'] = $request['detail'];
        $topic['certification_id'] = $request['certification_id'];
        
        $topic->update();
        return redirect()->route('certificationTopicList')->with('success','Successfully Updated');
    }

    public function deleteTopic($id)
    {
        CertificationTopic::find($id)->delete();
    }

    public function topicTrashList()
    {
        $data['trashTopics'] = CertificationTopic::onlyTrashed()->get();
        return view('cms.trashed.CertificationTopicTrash',$data);
    }
    public function restoreTopic($id)
    {
        CertificationTopic::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }
    public function forceDeleteTopic($id)
    {
        $topic = CertificationTopic::onlyTrashed()->find($id);
        $topic->courses()->detach();
        $topic->forceDelete();
        return back()->with('success','Permanently Deleted');

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
        Certification::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Permanently Deleted');
    }

}
