<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BlogComment;
use App\Models\Blog;
use App\Models\User;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: ax, title o 10 kalame e avale content e blog ro pas midim be blog.blade.php . pagination 12 tayi.

        $blogs = Blog::orderBy('created_at', 'desc')
            ->paginate(12);


        return view('blogs.blogIndex', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.blogCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(User::isAdmin())
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

                $blog = Blog::find($id);
                $author = $blog->user->nickname;
                
                $comments = BlogComment::where('blog_id', '=', $blog->id)->get();

                // dd($comments);
                return view('blogs.blogShow', compact([
                    'blog',
                    'author',
                    'comments'
                ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);

        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::find($id)->delete();

        return redirect()->back();
    }
}
