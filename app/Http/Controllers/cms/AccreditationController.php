<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Carbon\Carbon;
use App\Http\Requests\cms\AccreditationRequest;

class AccreditationController extends Controller
{
    private $Image_prefix;
    public function __construct()
    {
        $this->Image_prefix = "accreditation";
    }

    public function list(Request $request)
    {
        $this->authorize('view',  new Accreditation());
        $data['accreditations'] = Accreditation::get();
        return view('cms.accreditation.accreditation',$data);
    }

    public function create()
    {
        $this->authorize('create',  new Accreditation());
        $data['accreditation'] = new Accreditation();
        $data['submitRoute'] = "InsertAccreditation";
        return view('cms.accreditation.accreditationform',$data);
    }

    public function insert(AccreditationRequest $request)
    {
        $this->authorize('create',  new Accreditation());
        $accreditation=new Accreditation();
        $accreditation->name         = $request->name;
         
        if($request->hasFile('image')){
        
            $imageName = $request->author.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($accreditation->image_path), $imageName);
        
            $accreditation->image = $imageName;

        }
        
        $accreditation->save();
        
        return redirect()->route('accreditationList')->with('success','Successfully Added');
    }
    
    public function edit(Accreditation $accreditation)
    {
        $this->authorize('update', $accreditation);
        $data['accreditation'] = $accreditation;
        $data['submitRoute'] = array('updateAccreditation',$accreditation->id);
     
        return view("cms.accreditation.accreditationform",$data);
    }

   public function update(Accreditation $accreditation,AccreditationRequest $request)
   {

        $this->authorize('update', $accreditation);
        $accreditation->name         = $request->name;
    
        if($request->hasFile('image')){
            $imageName = $this->Image_prefix.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path($accreditation->image_path), $imageName);
            $accreditation->image = $imageName;
        }
        
        $accreditation->save();
        
        return redirect()->route('accreditationList')->with('success','Successfully Updated');
   }

   public function delete(Accreditation $accreditation)
   {
        $this->authorize('delete', $accreditation);
        $accreditation->delete();
   }

       
   public function accreditationtrashList()
   {
        $this->authorize('view',  new Accreditation());
    
        $data['trashedAccreditation'] = Accreditation::onlyTrashed()->get();
 
        return  view('cms.trashed.accreditationtrashedlist',$data);
       
   }

   public function restoreAccreditation($id)
   {
        $this->authorize('restore', new Accreditation());
        $accreditation = Accreditation::onlyTrashed()->find($id)->restore();
 
       return back()->with('success','Successfully Restored');

   }
   public function forceDeleteAccreditation($id)
   {
        $this->authorize('forceDelete', new Accreditation());
        $accreditation = Accreditation::onlyTrashed()->find($id)->forceDelete();
        
        return back()->with('success','Permanently Deleted');

   }
}
