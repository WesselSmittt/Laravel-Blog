<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
      
        $blogs = Blog::all();

   
        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function show($id)
    {
        $blog = Blog::find($id);

      
        if (!$blog) {
            return redirect('/blogs')->with('error', 'Blog post not found.');
        }

        return view('blogs.show', ['blog' => $blog]);
    }

    public function create()
    {
        return view('blogs.create');
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        
        Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->id(), 
        ]);

        return redirect('/blogs')->with('success', 'Blog post created successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        
        if (!$blog) {
            return redirect('/blogs')->with('error', 'Blog post not found.');
        }

        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            
        ]);

        
        $blog = Blog::find($id);

       
        if (!$blog) {
            return redirect('/blogs')->with('error', 'Blog post not found.');
        }

       
        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            // Update other fields as needed
        ]);

        return redirect('/blogs')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

       
        if (!$blog) {
            return redirect('/blogs')->with('error', 'Blog post not found.');
        }

    
        $blog->delete();

        return redirect('/blogs')->with('success', 'Blog post deleted successfully.');
    }
    
}