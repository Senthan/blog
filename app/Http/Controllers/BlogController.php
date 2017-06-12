<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\BlogCategory;
use Illuminate\Routing\ResponseFactory;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Requests\BlogStoreRequest;

class BlogController extends Controller
{
    protected $response;

    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

 
    public function index()
    {
        $this->authorize(new Blog());
        $blogs = Blog::with('category')->get()->values();
        if (request()->ajax()) {
            return $this->response->json($blogs);
        }

        return view('blog.index', compact('blogs'));  
    }

 
    public function create()
    {
        $this->authorize(new Blog());
        $categories = BlogCategory::all();
        return view('blog.create', compact('categories'));  
    }


    public function store(BlogStoreRequest $request)
    {
        $this->authorize(new Blog());
        $pageItem = Blog::create($request->only(['name', 'description', 'blog_category_id'])); 
        $pageItem->user_id = auth()->id();
        $pageItem->save();
        $file = $request->file('chooseFile');
        $fileType = $file->getMimeType();
        $destinationPath = base_path('public');
        $path = $destinationPath.'/media/'.$pageItem->id;
        $imageName = '';
        if(str_contains($fileType, 'image')) {
            $imageName = 'image'.(count($pageItem->getMedia())+1).'.'.$file->getClientOriginalExtension();
            $fileType = 'image';
        } elseif (str_contains($fileType, 'video')) {
            $imageName = 'video'.(count($pageItem->getMedia())+1).'.'.$file->getClientOriginalExtension();
            $fileType = 'video';
        } elseif (str_contains($fileType, 'pdf') || str_contains($fileType, 'document')) {
            $imageName = 'document'.(count($pageItem->getMedia())+1).'.'.$file->getClientOriginalExtension();
            $fileType = 'document';
        }
        $file->move($path, $imageName);

        $pageItem->addMedia($path.'/'.$imageName)->withCustomProperties(['type' => $fileType]);


        return redirect()->route('blog.index');
    }

   
    public function edit(Blog $blog)
    {
        $this->authorize($blog);
        $categories = BlogCategory::all();
        return view('blog.edit', compact('blog', 'categories'));
    }

    
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $this->authorize($blog);
        $blog->update($request->only(['name', 'description', 'blog_category_id']));    
        return redirect()->route('blog.index');
    }

    public function destroy(Blog $blog)
    {
        $this->authorize($blog);
        $blog->delete();
        return redirect()->route('blog.index');
    }

    public function delete(Blog $blog)
    {
        $this->authorize($blog);
        return view('blog.delete', compact('blog'));
    }
}
