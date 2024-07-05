<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function search(Request $request){

        $key=$request->input('key');


        $posts = Posts::where(function($search) use($key){
            $search->where('title', 'like', "%$key%")
            ->orWhere('desc','like',"%$key%");
        })
        ->orWhereHas('user',function($search) use($key){
            $search->where('name','like',"%$key%");
        })
        ->get();

        // $posts = Posts::search('key')->paginate(2); 


        return view('Post.home',['key'=>$key,'posts'=>$posts]);

    }

    public function filter(Request $request ){

        $from=$request->input('from');
        $to=$request->input('to');
        $posts = Posts::whereBetween('created_at',[$from,$to])->get();

        return view('Post.home',['from'=>$from,'to'=>$to,'posts'=>$posts]);

    }


}
