<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class RestoreController extends Controller
{
    public function deleted()
    {
        $posts = Posts::onlyTrashed()->get();

        return view("Post.deleted",compact("posts"));

    }

    public function restore($id){

        $post=Posts::withTrashed()->findOrFail($id);

        $post->restore();

        return redirect()->route('deleted')->with('success','data restored successfully');


    }

    public function forceDelete($id){

        $post=Posts::withTrashed()->findOrFail($id);

        $post->forceDelete();

        return redirect()->route('deleted')->with('success','data deleted premanently');

    }
}
