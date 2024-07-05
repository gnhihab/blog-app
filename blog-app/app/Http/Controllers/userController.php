<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request,$id){

        $user = User::findOrFail($id);
        return view("User.profile",compact("user"));

    }

    public function allUsers(UsersDataTable $datatable){

        return $datatable->render(view:'User.allUsers');
    }

    public function edit($id){

        $user=User::findOrFail($id);
        $users=User::all();
        return view('User.edit',compact("user","users"));

    }

    public function update(Request $request ,$id){


        $data = $request->validate([
            "name"=>"required|string|max:50",
            "email"=>"required|email|unique:users,email,".$id,
        ]);

        $user=User::FindOrFail($id);

        $user->update($data);
        return redirect()->route('users')->with('success','user updated successfully');
    }

    public function delete($id){

        $user=User::findOrFail($id);

        $user->delete();
        $user->posts()->delete();

        return redirect()->route('users')->with('success','user and his posts deleted successfully');


    }


}
