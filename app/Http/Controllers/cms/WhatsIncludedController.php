<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\whatsIncluded;
use App\Models\whatsIncludedHeaders;
use Carbon\Carbon;
use App\Http\Requests\cms\WhatsIncludedMainRequest;

class WhatsIncludedController extends Controller
{
    public function list()
    {
        $whatsincluded = whatsIncludedHeaders::all();
        $data['whatsincluded'] = $whatsincluded;
        return view('cms.whatsincluded.whatsincludedMain', $data);
    }
    public function form()
    {
        $data['whatsincluded'] = new whatsincludedHeaders();
        $data['submitRoute'] = 'insertWhatsIncluded';
        return view('cms.whatsincluded.whatsIncludedFormMain',$data);
    }
    public function insert(WhatsIncludedMainRequest $request)
    {
        $inputs = $request->input();
        $whatsincluded = whatsIncludedHeaders::firstOrNew(['name'=>$inputs['name']]);
        $whatsincluded->content = $inputs['content'];
        if($request->hasFile('icon')){
            $iconName = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path("/images/whatsinclude/"), $iconName);
            $whatsincluded->icon = 'whatsinclude/'.$iconName;
        }
        $whatsincluded->save();
        
        return redirect()->route('whatsincludedListRoute')->with('success','WhatsIncluded Added');
    }
    public function edit(whatsIncludedHeaders $whatsincluded)
    {
        $data['whatsincluded'] = $whatsincluded;
        $data['submitRoute'] = 'updateWhatsIncluded';
        return view('cms.whatsincluded.whatsIncludedFormMain',$data);

    }
    public function update(WhatsIncludedMainRequest $request)
    {
        $inputs        = $request->except('_token');
        $whatsincluded = whatsIncludedHeaders::find($inputs['id']);
        $whatsincluded->content = $inputs['content'];
        $whatsincluded->name    = $inputs['name'];

        if($request->hasFile('icon')){
            $iconName = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path("/images/whatsinclude/"), $iconName);
            $whatsincluded->icon = "whatsinclude/".$iconName;
        }
        if($inputs['removeicontxt']!=null)
        {
            $whatsincluded->icon = null;
        }
        $whatsincluded->update();
        
        return redirect()->route('whatsincludedListRoute')->with('success','WhatsIncluded Updated');
    }
    public function delete(whatsIncludedHeaders $whatsincluded)
    {
        $whatsincludedCourse = whatsIncluded::where('header_id',$whatsincluded->id)->get();
        foreach($whatsincludedCourse as $whatsinclude)
        {
            $whatsinclude->delete();
        }
        $whatsincluded->delete();
    }
    public function whatsIncludedTrashList()
    {
        $data['trashedWhatsIncluded'] = whatsIncludedHeaders::onlyTrashed()->get();
    
        return  view('cms.trashed.whatsIncludedTrashedList',$data);
        
    }
    public function restoreWhatsInclude($id)
    {
        whatsIncludedHeaders::onlyTrashed()->find($id)->restore();
        return back()->with('success','Successfully Restored');
    }
    public function forceDeleteWhatsInclude($id)
    {
        whatsIncludedHeaders::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Permanently Deleted!');
    }
}
