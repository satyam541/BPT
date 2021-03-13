<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function list()
    {
        $data['modules'] = Module::all();
        return view('cms.module.moduleList',$data);
    }

    public function create()
    {
        $data['module'] = new Module();
        $data['submitRoute'] = 'moduleInsert';
        return view('cms.module.moduleForm',$data);
    }

    public function insert(Request $request)
    {
        $input  = $request->except('_token');
        $data   = new Module();
        $data['name']  = $input['name'];
        $data->save();
        return redirect()->route('moduleList')->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $data['module']      = Module::find($id);
        $data['submitRoute'] = ['moduleUpdate','id'=>$id];
        return view('cms.module.moduleForm',$data);
    }

    public function update(Request $request)
    {
        $input  = $request->except('_token');
        
        $data   = Module::find($input['id']);
        $data['name']  = $input['name'];
        $data->update();
        return redirect()->route('moduleList')->with('success','Successfully Updated');
    }

    public function delete($id)
    {
        Module::find($id)->delete();
    }
}
