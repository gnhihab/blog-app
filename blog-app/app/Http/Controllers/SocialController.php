<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToGoogle(){

        return Socialite::driver('google')->redirect;

    }
    public function googleCallback(){
        try{
            $user = Socialite::driver('google')->user;
            $finduser = User::where('social_id',$user->id)->first;
            if($finduser){
                Auth::login($finduser);
                return redirect('posts');
            }else{
                $newuser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'social_id'=>$user->social_id,
                    'password'=>Hash::make('my-google'),
                ]);
                Auth::login($newuser);
                return redirect('posts');
            }
        }
        catch(\Throwable $th){
            dd('wrong');
        }

    }
}
