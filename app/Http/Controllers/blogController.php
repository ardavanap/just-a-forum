<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BlogComment;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class blogController extends Controller
{

    public function index()
    {


        $blogs = Blog::orderBy('created_at', 'desc')
            ->paginate(12);


        return view('blogs.blogIndex', ['blogs' => $blogs]);
    }


    public function create()
    {
        return view('blogs.blogCreate');
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            // 'image' => 'required'
        ]);

        $blog = Blog::create([
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'content' => $validatedData['body'],
            // 'image' => $validatedData['image'],
        ]);
        return view('blogs.blogStoreSuccess', compact('blog'));

    }



    public function show(string $id)
    {

                $blog = Blog::find($id);
                $author = $blog->user->nickname;
                
                $comments = BlogComment::where('blog_id', '=', $blog->id)->get();

                return view('blogs.blogShow', compact([
                    'blog',
                    'author',
                    'comments'
                ]));
    }


    public function edit(string $id)
    {
        $blog = Blog::find($id);

        Gate::authorize('edit', $blog);

        

        return view('blogs.edit', compact('blog'));
    }

 

    public function update(Request $request, string $id, Blog $blog)
    {

        Gate::authorize('update', $blog);

        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $isOwner = Blog::find($id)->user_id == auth()->id(); 

        if(User::isAdmin() || $isOwner )
        {
            $blog = Blog::find($id);
            
            $blog->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['body']
            ]);
            
            return view('blogs.blogUpdateSuccess', compact('blog'));
        }else{
            return 'you are not allowed to edit this Blog.';
        }
    }



    public function destroy(string $id, Blog $blog )
    {
        Gate::authorize('delete', $blog);

        if (auth()->user()->cannot('delete', $blog)){
            abort(403);
        }

        Blog::find($id)->delete();

        return redirect()->back();
    }
}
