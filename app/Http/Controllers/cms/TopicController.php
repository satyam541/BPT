<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Topic;
use App\Models\TopicContent;
use App\Http\Requests\cms\BulletPointRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Course;
use App\Models\Faq;
use App\Models\whatsIncluded;
use App\Models\BulletPoint;
use App\Models\whatsIncludedHeaders;
use App\Models\Accreditation;
use App\Http\Requests\cms\TopicContentRequest;
use App\Http\Requests\cms\TopicRequest;
use App\Http\Requests\cms\WhatsIncludedRequest;

class TopicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $Image_prefix;

    public function __construct()
    {
        $this->Image_prefix = "topicImage";
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list(Request $request)
    {
        $this->authorize('view', new Topic());
        $topics=Topic::all();
        $checked=null;
        if(isset($request->popular)){
            $topics = Topic::whereHas('popular')->get();
            $checked='checked';
        }
        return view('cms.topic.topiclist',compact('topics','checked'));
    }

    public function unlinkedTopicList()
    {
        $data['topics']     = Topic::whereDoesntHave('category')->get();
        $data['category']   = Category::pluck('name','id');
        return view('cms.topic.unlinkedTopics',$data);
    }

    public function linkCategory($id, Request $request)
    {
        $topic = Topic::find($id);
        $category=encodeUrlSlug(Category::find($request['category_id'])->name);
        $topic->reference           = 'training-courses'.'/'.$category.'/'.encodeUrlSlug($topic['name']);
        $topic->category_id         = $request['category_id'];
        $topic->update();
        return back()->with('success','Category linked');
    }

    public function contentList(Request $request)
    {
        $this->authorize('view', new Topic());
        $filter                 = $request->all();
        $data['selectedTopic']  = empty($filter['topic'])? NULL : $filter['topic'];
        $data['selectedCountry'] = empty($filter['country'])? NULL : $filter['country'];
        $query                  = TopicContent::query();
        $query                  = empty($filter['topic'])? $query : $query->where('topic_id',$filter['topic']);
        $query                  = $query->where('country_id',country()->country_code);
        $query->whereHas('topic');
        $result                 = $query->get();
        $list['topics']         = Topic::all()->pluck('name','id')->toArray();
        $list['countries']      = Country::all()->pluck('name','country_code')->toArray();
        $data['list']           = $list;
        $data['contents']       = $result;
        return view('cms.topic.contents',$data);
    }
    public function bulletPointList(Request $request)
    {
        $data['selectedCourse'] = $request->module;
        $data['editbulletpointroute']='topicEditBulletPoint';
        $data['deletebulletpointroute']='topicDeleteBulletPoint';
        $data['insertbulletpointroute']='topicCreateBulletPoint';
        $data['type']   ='topic';
        $data['module'] = Topic::with('Bulletpoint')->find($request->module);
        return view('cms.bulletPoints.bulletPoints',$data);
        
    }
    public function createBulletPoint(Request $request)
    {
        $data['result']         = new BulletPoint;
        $data['type']           = 'topic';
        $data['module_id']      = $request->module;
        $data['submitRoute']    = ['topicInsertBulletPoint','module'=>$request->module];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }
    public function submitBulletPoint(BulletPointRequest $request, $module)
    {
        $input                      = $request->except("_token");
        $data                       = array();
        $data['module_id']          = $module;
        $data['module_type']        = 'topic';
        if($input['id']==null){
            $max = BulletPoint::where('module_type', 'topic')->max('display_order');
            $data['display_order']= $max+1;
        }
        $data['bullet_point_text']  = $input['bullet_point_text'];
        BulletPoint::updateOrCreate(['id' =>$input['id']],$data);
        return redirect()->route('topicBulletPointList',['module'=>$data['module_id']])->with('success','Operation done!');
        
    }

    public function editBulletPoint($id)
    {
        $data['result']         = BulletPoint::find($id);
        $data['type']           = 'topic';
        $data['module_id']      = $data['result']->module_id;
        $data['submitRoute']    = ['topicUpdateBulletPoint','module'=> $data['result']->module_id];
        return view('cms.bulletPoints.bulletPointForm',$data);
    }

    public function deleteBulletPoint(BulletPoint $courseDetail)
    {
        $courseDetail->delete();
    }

    public function whatsincludedlist(Request $request)
    {
         $id = $request->module;
         if(empty($id))
         {
             $url = route('courseList');
             return redirect($url,302);
         }
         $data['module'] = 'topic';
         $data['result'] = Topic::with('whatsIncluded')->find($id);
         $data['deletewhatsincludedroute']='topicDeleteWhatsincluded';
         $data['insertwhatsincludedroute']='topicCreateWhatsincluded';
         return view('cms.whatsincluded.whatsincluded',$data);
    }
 
  
    public function whatsincludedcreate(Request $request)
    {
         $topic_id = $request->module;
         if(empty($topic_id))
         {
             $url = route('courseList');
             return redirect($url,302);
         }
         $topics = Topic::all();
         $course = $topics->where('id', $topic_id)->first();
         $data['course'] = $course;
         $data['module'] = 'topic';
         $data['list'] = $topics->pluck('name','id')->toArray();
         $data['headings'] =whatsIncludedHeaders::all()->pluck('name','id')->toArray();
         $data['whatsincluded'] = new whatsincluded();
         $data['submitRoute'] = 'topicInsertWhatsincluded';
      
        return view('cms.whatsincluded.whatsIncludedForm',$data);
    }
 
    public function sortWhatsIncluded(Request $request){
         $inputs     =   $request->input();
         $sort       =   $inputs['sort'];
         foreach($sort as $index=>$id)
         {
             $whatsincluded = whatsIncluded::find($id);
             $whatsincluded->sequence = $index+1;
             $whatsincluded->save();
         }
         return "success";
    }
    public function whatsincludedinsert(WhatsIncludedRequest $request)
    {
        $topic_id = $request->course_id;
        $header_id = $request->header_id;
 
        Topic::find($topic_id)->WhatsIncluded()->syncWithoutDetaching([$header_id=>['module_id'=> $topic_id, 'module_type' => 'topic']]);
 
         \Session::flash('success', 'WhatsIncluded Added!'); 
        return redirect()->back();
    }
 
    public function whatsincludeddelete($course, $whatsincluded)
    { 
         Topic::find($course)->WhatsIncluded()->detach($whatsincluded);
     
    }
    public function contentCreate(Request $request)
    {
       
        $this->authorize('create', new Topic());
        $filter             = $request->all();
        $selectedTopic      = empty($filter['topic'])? NULL : $filter['topic'];
        $selectedCountry    = empty($filter['country'])? NULL : $filter['country'];
        $topicDetail        = TopicContent::firstOrNew(array('topic_id'=>$selectedTopic,'country_id'=>$selectedCountry));
        $list['topics']     = Topic::all()->pluck('name','id')->toArray();
        $list['countries']  = Country::all()->pluck('name','country_code')->toArray();
        $data['list']       = $list;
        $data['topicDetail'] = $topicDetail;
        $data['submitRoute'] = 'insertTopicContent';
        return view('cms.topic.contentForm',$data);
    }
    
    public function create()
    {
        $this->authorize('create', new Topic());
        $data['topic']          = new Topic();
        $data['submitRoute']    = 'insertTopic';
        $data['categorySlugs']   = Category::all()->pluck('reference','id')->toArray();
        $data['categories']     = Category::all()->pluck('name','id')->toArray();
        $list['accreditations'] = Accreditation::all()->pluck('name','id')->toArray();
        $data['list']           = $list;
        return view('cms.topic.topicForm',$data);
    }

    public function insert(TopicRequest $request)
    {
        $this->authorize('create', new Topic());
        $inputs                     = $request->except("_token");
        // dd($inputs);
        $topic                      = new Topic();
        $topic->reference           = $inputs['reference'];
        $topic->name                = $inputs['name'];
        $topic->tag_line            = $inputs['tag_line'];
        $topic->accreditation_id    = $inputs['accreditation_id'];
        $topic->accredited          = isset($inputs['accredited']);
        $topic->published           = isset($inputs['published']);
        $topic->is_online           = isset($inputs['is_online']);
        $topic->priority            = isset($inputs['priority']);
        $topic->category_id         = $inputs['category_id'];
        $topic->ip_trademark        = $inputs['ip_trademark'];

        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($topic->image_path), $imageName);
            $topic->image = $imageName;
        }
        
        $topic->save();
        if(isset($inputs['is_popular']))
        {
            $topic->popular->save();
        }
       
        
        return redirect()->route('topicList')->with('success','Successfully Added');
    }

    public function contentInsert(TopicContentRequest $request)
    {
        $this->authorize('create', new Topic());
        $inputs              = $request->except("_token");
        $content             = TopicContent::firstOrCreate(['topic_id'=>$inputs['topic_id'],'country_id'=>$inputs['country_id']],$inputs);
        return back()->with('success','Content Added');

    }

    public function edit($topic)
    {
        $this->authorize('update', new Topic());
        $data['topic']          = Topic::with('faqs','Popular')->find($topic);
        $data['submitRoute']    = array('updateTopic',$data['topic']->id);
        $data['categorySlugs']   = Category::all()->pluck('reference','id')->toArray();
        $data['categories']     = Category::all()->pluck('name','id')->toArray();
        $list['accreditations'] = Accreditation::all()->pluck('name','id')->toArray();
        $data['list']           = $list;
        return view("cms.topic.topicForm",$data);
    }

    public function contentEdit(Request $request,TopicContent $topicDetail)
    {
        $this->authorize('update', $topicDetail->topic);
        $list['topics'] = Topic::all()->pluck('name','id')->toArray();
        $list['countries'] = Country::all()->pluck('name','country_code')->toArray();
        $data['list'] = $list;
        $data['topicDetail'] = $topicDetail;
        $data['submitRoute'] = array('updateTopicContent',$topicDetail->id);
        
        return view('cms.topic.contentForm',$data);
    }
    
    public function update(Topic $topic,TopicRequest $request)
    {
        $this->authorize('update', $topic);
        $inputs                     = $request->all();
        // dd($inputs);
        $topic->name                = $inputs['name'];
        $topic->reference           = $inputs['reference'];
        $topic->tag_line            = $inputs['tag_line'];
        $topic->accreditation_id    = $inputs['accreditation_id'];
        $topic->accredited          = isset($inputs['accredited']) ? 1:0;
        $topic->published           = isset($inputs['published'])? 1:0;
        $topic->is_online           = isset($inputs['is_online'])? 1:0;
        $topic->priority            = isset($inputs['priority'])? 1:0;
        $topic->category_id         = $inputs['category_id'];
        $topic->ip_trademark        = $inputs['ip_trademark'];
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($topic->image_path), $imageName);
            $topic->image = $imageName;
        }
        $topic->save();
        if(isset($inputs['is_popular']))
        {
            $topic->popular->save();
        }
        else
        {
            $topic->popular->delete();
        }
       
        return redirect()->route('topicList')->with('success','Successfully Updated');
    }

    public function contentUpdate(TopicContentRequest $request,TopicContent $topicDetail)
    {
        $this->authorize('update', $topicDetail->topic);
        $inputs              = $request->except("_token");
        
        $content = $topicDetail->update($inputs);
        
        return back()->with('success','Content Updated');
    }

    public function delete(Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
    }

    public function contentDelete(Request $request,TopicContent $topicDetail)
    {
        $this->authorize('delete', $topicDetail->topic);
        $topicDetail->delete();
    }
        
   public function topictrashList()
   {
        $this->authorize('view', new Topic());
        $data['trashedTopics'] = Topic::onlyTrashed()->get();
    
        return  view('cms.trashed.topicTrashedList',$data);
   }

   public function restoreTopic($id)
   {
        $this->authorize('restore', new Topic());
        $topic = Topic::onlyTrashed()->find($id)->myRestore();
    
        return back()->with('success','Successfully Restored');

   }
   public function forceDeleteTopic($id)
   {
        $this->authorize('forceDelete', new Topic());
        $topic = Topic::onlyTrashed()->find($id)->myforceDelete();
    
        return back()->with('success','Permanently Deleted');


   }

   
   public function multipleFaq()
   {
       $data['courses'] = Course::pluck('name','id')->toArray();
       return view('cms.faq.insertmultiple',$data);
   }
   
   public function insertMultipleFaq(Request $request)
   {
       $input       = $request->input();
       $questions   = $request->get('question');
       $answers     = $request->get('answer');
       foreach($input['courses'] as $module_id){
            $module = Course::find($module_id);
            if(empty($questions))
            {
                \Session::flash('failure', 'please add faq to save!'); 
                return back();
            }
            if(empty($answers))
            {
                \Session::flash('failure', 'please add faq to save!'); 
                return back();
            }

            foreach($questions as $i)
            {
                $module->faqs()->create([
                    'question' => $questions[$i],
                    'answer'    => $answers[$i],
                    'display_order' => $module->faqs()->count()+1
                ]);
            }
        }
       return back()->with('success','Success!');
   }
}