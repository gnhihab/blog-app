<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Posts::all();

        // $posts = posts::paginate(2);

        return view("Post.home",compact("posts"));

    }

    public function create()

    {
        $users = User::all();
        return view('Post.create',compact("users"));

    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $data['image'] = Storage::putFile("posts", $data['image']);

        $post = Posts::create($data);
        $user = User::find($post->user_id);
        if ($user) {
            $user->posts_num = $user->posts()->count();
            $user->save();
        }

        return redirect()->route('posts.index')->with('success', 'data inserted successfully');
    }


    public function edit($id){

        $post=Posts::FindOrFail($id);
        $users=User::all();
        return view('Post.edit',compact("post","users"));

    }

    public function update(PostRequest $request ,$id){

        $data =$request->validated();

        $post=Posts::FindOrFail($id);

        if($request->has('image')){

            if($post->image !== null){

                Storage::delete($post->image);

            }
            $data['image']=Storage::putFile("posts",$data['image']);

        }

        $post->update($data);
        return redirect()->route('posts.index')->with('success','data updated successfully');


    }

    public function destroy($id){

        $post=Posts::findOrFail($id);

        $post->delete();

        // return redirect()->route('posts.index')->with('success','data deleted successfully');


        return response()->json(['message'=>'data deleted successfully']);

    }

    // public function export(){

    //     return Excel::download(new PostExport(),'posts.xlsx');
    // }


}

