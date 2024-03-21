<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
     //all
     public function all(){
        $posts = posts::all();
        // return PostResource::collection($posts);
        // return view($posts);

        // $posts = posts::paginate(2);
        return view("User.home",compact("posts"));
     }
    public function create(){

        // dd("hi");


        // return view("User.create");
        $posts = posts::all();
        $users = User::all();
        return view('User.create',compact("posts","users"));
    }

    public function store(Request $request){

        // dd($request->all());


        $data =$request->validate([

            "title"=>"required|string|max:255",
            "desc"=>"required|string",
            "image"=>"required|image|mimes:png,jpg",
            "user_id"=>"required|exists:users,id",

        ]);



        $data['image']=Storage::putFile("posts",$data['image']);

        posts::create($data);

        return redirect(url("posts"))->with('success',"'data inserted successfully'");

    }

    public function edit($id){

        $post=posts::FindOrFail($id);
        return view('User.edit',compact("post"));

    }

    public function update(Request $request ,$id){

        $data =$request->validate([

            "title"=>"required|string|max:255",
            "desc"=>"required|string",
            "image"=>"image|mimes:png,jpg",

        ]);

        $post=posts::FindOrFail($id);

        if($request->has('image')){

            if($post->image !== null){

                Storage::delete($post->image);

            }
            $data['image']=Storage::putFile("posts",$data['image']);

        }

        $post->update($data);
        return redirect(url("posts"))->with('success','data updated successfully');


    }

    public function delete(Request $request,$id){

        $post=posts::findOrFail($id);

        if($post->image !== null){

            Storage::delete($post->image);

        }

        $post->delete();

        return redirect(url("posts"))->with('success','data deleted successfully');

        // $post = posts::where('id',$request->id)->delete();
        // return response()->json(['message'=>'data deleted successfully']);

    }

    public function search(Request $request){

        $key=$request->input('key');
        // $posts=posts::where("title","like","$key%")->get();
        // session()->put('search_query',$key);


        $posts = posts::where(function($search) use($key){
            $search->where('title', 'like', "%$key%")
            ->orWhere('desc','like',"%$key%");
        })
        ->orWhereHas('user',function($search) use($key){
            $search->where('name','like',"%$key%");
        })
        ->get();


        // return view("User.home",compact("posts"));
        return view('User.home',['key'=>$key,'posts'=>$posts]);

    }

    public function filter(Request $request ){

        $from=$request->input('from');
        $to=$request->input('to');
        $posts = posts::whereBetween('created_at',[$from,$to])->get();

        // return view("User.home",compact("posts"));
        return view('User.home',['from'=>$from,'to'=>$to,'posts'=>$posts]);

    }



}
