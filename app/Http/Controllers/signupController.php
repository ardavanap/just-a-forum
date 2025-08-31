<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class signupController extends Controller
{
    public function index()
    {
        // TODO: vaqti ba 'get' request dadan, faqat safhe e sign up namayesh dade beshe
        return view('signup');
    }

    public function signup(Request $request)
    {
        // TODO: vaqati ba 'post' ferestadan, parameter ha ro begirim o prose e signup ro anjam bedim

        $request->validate([
            'nickname' => ['required', 'unique:users,nickname', 'max:20', 'min:3'],
            'password' => ['required', 'confirmed'],
            'email' => ['email', 'required', 'string','unique:users,email']
        ]);
        $password = bcrypt($request->input('password'));

        $user = User::firstOrNew([
            'nickname' =>       $request->input('nickname'),
            'email'     =>      $request->input('email'),
            'password'  =>      $password
        ])->save();

        // event(new Registered($user));

        return redirect('/tag');
    }
}
