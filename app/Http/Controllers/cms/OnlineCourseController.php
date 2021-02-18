<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\CourseElearning;
use App\Models\Topic;
use App\Models\CourseContent;
use App\Models\Country;
use App\Models\Accreditation;
use App\Http\Requests\cms\OnlineCourseRequest;
use App\Models\Course;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class OnlineCourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $Video_prefix;

    public function __construct()
    {
        $this->Video_prefix = "Video";
        $this->Image_prefix = "onlinecourseImage";
		// $this->middleware('access:role,insert')->only('insertRole');
    }

    public function list(Request $request)
    {
        $this->authorize('view',new CourseElearning());

        $onlineCourses = courseElearning::with('course')->get();
        return view('cms.onlinecourse.onlinecourse',compact('onlineCourses'));
    }

  
    public function create()
    {
        $this->authorize('create',  new CourseElearning());
        $list['courses']        = Course::all()->pluck('name','id')->toArray();
       
        $data['list']           = $list;
        $data['onlinecourse']   = new courseElearning();
        $data['submitRoute']    = 'insertOnlineCourse';
        $data['categorySlug']   = '';
        return view('cms.onlinecourse.onlinecourseForm',$data);
    }


    public function insert(OnlineCourseRequest $request)
    {
        $this->authorize('create',  new CourseElearning());
        $onlinecourse                   =   new courseElearning();
        $reference                      =   encodeUrlSlug(Course::find($request->course_id)->name);
        $onlinecourse->reference        =   $request->reference;
        $onlinecourse->online_course_name=  $request->online_course_name;
        $onlinecourse->course_id        =   $request->course_id;
        $onlinecourse->summary          =   $request->summary;
        $onlinecourse->outline          =   $request->outline;
        $onlinecourse->whats_included   =   $request->whats_included;
        $onlinecourse->duration         =   $request->duration;
        $onlinecourse->tag_line         =   $request->tag_line;
        $onlinecourse->overview         =   $request->overview;
        $onlinecourse->video            =   $request->video;
        $onlinecourse->thumbnail        =   $request->thumbnail;
        $onlinecourse->heading          =   $request->heading;
        $onlinecourse->meta_title       =   $request->meta_title;
        $onlinecourse->meta_keywords    =   $request->meta_keywords;
        $onlinecourse->meta_description =   $request->meta_description;
        if($request->hasFile('thumbnail')){
           
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path($onlinecourse->path), $imageName);
            $onlinecourse->thumbnail = $imageName;
        }
      
        $onlinecourse->save();
        if(!empty($onlinecourse->id))
        {
        \Session::flash('success', 'Online Course created!'); 
        }
        else
        {
          \Session::flash('failure', 'Duplicate Data Found!'); 
        
        }

        return back();
    }

 
    public function edit(courseElearning $course)
    {
        $this->authorize('update', $course);
        
        // $list['topics'] = Topic::all()->pluck('name','id')->toArray();
        $list['courses']        = Course::all()->pluck('name','id')->toArray();
        
        $data['list']           = $list;
        $data['submitRoute']    = array('updateOnlineCourse',$course->id);
        $data['onlinecourse']   = $course;
       
        return view("cms.onlinecourse.onlinecourseForm",$data);
    }


    public function update(courseElearning $course,OnlineCourseRequest $request)
    {
        $this->authorize('update', $course);
        $course->reference          =   $request->reference;
        $course->online_course_name =   $request->online_course_name;
        $course->course_id          =   $request->course_id;
        $course->summary            =   $request->summary;
        $course->outline            =   $request->outline;
        $course->whats_included     =   $request->whats_included;
        $course->duration           =   $request->duration;
        $course->overview           =   $request->overview;
        $course->tag_line           =   $request->tag_line;
        $course->video              =   $request->video;
        $course->heading            =   $request->heading;
        $course->meta_title         =   $request->meta_title;
        $course->meta_keywords      =   $request->meta_keywords;
        $course->meta_description   =   $request->meta_description;
        if($request->hasFile('thumbnail')){
           
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path($course->path), $imageName);
            $course->thumbnail = $imageName;
        }
            
            $course->save();
  
 
            if(!empty($course->id))
            \Session::flash('success', 'Online Course updated!'); 
        return back();
    }

   
    public function delete(courseElearning $course)
    {
        $this->authorize('delete', $course);
        $course->delete();
    }
    public function uploadVideo(FileReceiver $receiver)
    {
        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need
            return $this->saveFile($save->getFile());
        }

        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone()
        ]);
    }

    //save file
    protected function saveFile(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();
        // get Mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        // Build the file path
        $filePath = "uploads/course/";
        $finalPath = public_path($filePath);
        // move the file name
        $finalName = Carbon::now()->timestamp.$fileName;
        $file->move($finalPath, $finalName);
        return response()->json([
            'path'      => $filePath,
            'oldname'   => $fileName,
            'newname'   => $finalName,
            'mime_type' => $mime
        ]);
    }
 
    public function trashList()
    {
        $data['trashOnlineCourses'] = courseElearning::onlyTrashed()->get();
        return view('cms.trashed.onlineCourseTrashList',$data);
    }

    public function restore($id)
    {
        $data = courseElearning::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }

    public function forceDelete($id)
    {
        $data = courseElearning::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Permanently Deleted!');
    }

}