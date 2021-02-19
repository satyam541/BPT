<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\CourseAddon;
use Illuminate\Http\Request;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $this->authorize('view',new CourseElearning());
        $courseAddons=CourseAddon::all();
        return view('cms.addon.addonList',compact('courseAddons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $data['result']=new CourseAddon();
        $data['submitRoute']='AddonStore';
        return view('cms.addon.addonForm',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs=$request->all();
        CourseAddon::create($inputs);
        return redirect()->route('AddonList')->with('success','Addon Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[];
        $data['result']=CourseAddon::find($id);
        $data['submitRoute']='AddonUpdate';
        return view('cms.addon.addonForm',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputs=$request->all();
        CourseAddon::find($inputs['id'])->update($inputs);
        return redirect()->route('AddonList')->with('success','Addon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseAddon $courseAddon)
    {
        $courseAddon->delete();
    }
}
