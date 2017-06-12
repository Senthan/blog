<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryStoreRequest;
use App\BlogCategory;


class BlogCategoryController extends Controller
{
 
    public function create()
    {
        return view('category.create');  
    }

    public function store(BlogCategoryStoreRequest $request)
    {
        BlogCategory::create($request->only(['name', 'description'])); 
        return redirect()->route('blog.create');
    }

}
