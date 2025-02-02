<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Carbon\Carbon;
use App\Http\Requests\cms\ResourceRequest;

class ResourceController extends Controller
{
    // private $Image_prefix;
  

    public function __construct()
    {
        // $this->Image_prefix = "resourceImage";
    }
    
    public function resourceList()
    {
        $this->authorize('view',  new Resource());
        $data['Resources'] = Resource::all();   
        return view('cms.resources.resource',$data);
    }
    public function create()
    {
        $this->authorize('create',  new Resource());
        $data['resources'] = new Resource();
         $data['submitRoute'] = "insertresources";
        return view('cms.resources.resourcesForm',$data);
    }
 

    public function insert(ResourceRequest $request)
    {
        $this->authorize('create',  new Resource());
        
        $resources=new Resource();
     
        $resources->name            = $request->name;
        $resources->content         = $request->content;
        $resources->reference       = $request->reference;
        $resources->meta_title      = $request->meta_title;
        $resources->meta_desc       = $request->meta_desc;
        $resources->meta_keyword    = $request->meta_keyword;
       
        $resources->save();
        return redirect()->route('resourcesList')->with('success', 'Resource Added!');

    }
    public function  edit($resources)
    {
        $resources=Resource::where('id',$resources)->first();
        $this->authorize('update', $resources);
        $data['resources'] = $resources;
        $data['submitRoute'] = array('updateresources',$resources->id);  
        return view("cms.resources.resourcesForm",$data);
    }

    public function delete($resources)
    {
        $resources=Resource::where('id',$resources)->first();
        $this->authorize('delete', $resources);
        $resources->delete();

    }

    
    public function update( $resources,ResourceRequest $request)
    {
       
        $resources=Resource::where('id',$resources)->first();
        $this->authorize('update', $resources);
        $resources->name            = $request->name;
        $resources->content         = $request->content;
        $resources->reference       = $request->reference;
        $resources->meta_title      = $request->meta_title;
        $resources->meta_desc       = $request->meta_desc;
        $resources->meta_keyword    = $request->meta_keyword;
        $resources->save();
        return redirect()->route('resourcesList')->with('success', 'Resource updated!');
    }

    public function trashList()
    {
        $this->authorize('view', new Resource());
        $data['trashResources'] = Resource::onlyTrashed()->get();
        return view('cms.trashed.resourceTrashList',$data);
    }

    public function restore($id)
    {
        $this->authorize('restore', new Resource());
        Resource::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', new Resource());
        Resource::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Permanently Deleted!');
    }
}
