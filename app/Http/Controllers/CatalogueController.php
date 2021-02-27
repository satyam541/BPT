<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $categories                 = Category::with('topics')->get();
        $data['categoriesList']     = $categories->pluck('name', 'id');
        $data['categories']         = $categories;
        $data['topics']             = Topic::has('popular')->get();

        // dd($data);
        return view('catalogue', $data);
    }
}
