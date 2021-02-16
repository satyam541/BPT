<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\whatsIncluded;
use App\Models\whatsIncludedHeaders;
use Carbon\Carbon;

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
    public function insert(Request $request)
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
    public function update(Request $request)
    {
        $inputs = $request->input();
        $whatsincluded = whatsIncludedHeaders::firstOrNew(['id'=>$inputs['id']]);
        $whatsincluded->content = $inputs['content'];
        if($request->hasFile('icon')){
            $iconName = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path("/images/whatsinclude/"), $iconName);
            $whatsincluded->icon = "whatsinclude/".$iconName;
        }
        $whatsincluded->save();
        
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
}
