<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\User;

class profileController extends Controller
{
    public function index()
    {

        $user = User::find(auth()->id());
        $questions = $user->questions;
        $blogs = $user->blogs;

        return view('profile.index', compact(['user', 'questions', 'blogs']));
    }

    public function edit() {
        return view('profile.edit');
    }

    public function update(Request $request) {

        
        $validatedData = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'description'   => 'required',
            // 'avatar'        => ''
        ]);
        
        // dd($validatedData);

        User::find(auth()->id())
            ->update([
                'nickname' => $validatedData['name'],
                'email' => $validatedData['email'],
                'description' => $validatedData['description'],
            ]);
    }

}

