<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\posts;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile(Request $request,$id){

        $user = User::findOrFail($id);
        return view("User.profile",compact("user"));

    }

}
