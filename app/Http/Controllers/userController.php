<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function destroy(string $id) {
        $destroyedUser = User::destroy($id);

        if($destroyedUser)
        {
            return redirect()->back();
        }
    
        return response()->json(['message' => 'User deletion unsuccessful.'], 400);
    }

    public function suspendOrUnsuspend(string $id) {
        $user = User::findOrFail($id);
        if($user->suspended == 0) 
        {
            $user->suspended = 1;
            $user->save();

            return redirect()->back();
        }else{
            $user->suspended = 0;
            $user->save();
            
            return redirect()->back();
        }
    }
}
