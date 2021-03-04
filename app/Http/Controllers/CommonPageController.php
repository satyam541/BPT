<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonPageController extends Controller
{
    public function index(Request $request){
        dd($request->segment(1));
    }
}
