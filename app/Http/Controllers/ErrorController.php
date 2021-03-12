<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDetail;

class ErrorController extends Controller
{


    public function index()
    {

        $data['pageDetail'] = PageDetail::getContent('404');
        return view('errors.404',$data);

    }
}
