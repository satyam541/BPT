<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function newsletterList()
    {
        $data['newsletters'] = Newsletter::paginate(10);
        
        return view('cms.newsletter.newsletter',$data);
    }
}
