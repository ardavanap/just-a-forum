<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        // TODO: liste tag ha ro az db begir o neshun bede.
        $tags = Tag::all();

        return view('tag', compact('tags'));
    }

    public function likeOrDislikeTag(Request $request) {

        $validatedData = $request->validate([
            'selectedTags' => 'required'
        ]);

        $tagsID = explode(',',$validatedData['selectedTags']);

        User::find(auth()->id())
            ->tags()
            ->toggle($tagsID);

        return redirect()->route('profile');

    }

    public function userEditeTag() {
        
        if($userTags = User::find(auth()->id())->tags()->get())
        {

        $allTags = Tag::all();
        $tagsUserDoesNotHave = $allTags?->diff($userTags);
        
        return view('tagEdit', compact('userTags', 'tagsUserDoesNotHave'));
        }
    }

}