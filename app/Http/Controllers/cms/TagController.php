<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    
    public function tagList(Request $request)
    {
        $this->authorize('view', new Tag());
        $data['tags'] = Tag::all();

        return view('cms.article.tag',$data);
    }

    public function edit(Tag $tag)
    {
        $this->authorize('update', $tag);
        $data['tag'] = $tag;
        $data['submitroute'] = array('updateTag',$tag->id);
        return view("cms.article.tagForm",$data);
    }

   public function update(Tag $tag,Request $request)
   {
    $this->authorize('update', $tag);
       $tag->name  = $request->name;
       
       $tag->save();
       
       return back()->with('success','Successfully Updated!');
   }

   public function delete(Tag $tag)
   {
    $this->authorize('delete', $tag);
       $tag->delete();
   }

   public function tagtrashList()
   {
    $this->authorize('view', new Tag());
    $data['trashedTags'] = Tag::onlyTrashed()->get();
 

    return  view('cms.trashed.tagTrashedList',$data);
       
   }

   public function restoreTag($id)
   {
        $this->authorize('restore', new Tag());
        $tag = Tag::onlyTrashed()->find($id)->restore();
 
        return back()->with('success','Successfully Restored');

   }
   public function forceDeleteTag($id)
   {
        $this->authorize('forceDelete', new Tag());
        $tag = Tag::onlyTrashed()->find($id)->forceDelete();
 
        return back()->with('success','Permanently Deleted');

   }
}
