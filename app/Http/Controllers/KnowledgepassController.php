<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
class KnowledgepassController extends Controller
{
    
    public function index()
    {

        $data['topics']=Topic::has('courses')->with('courses.schedule')->get();
      
        return view('knowledge-pass',$data);

    }
}
