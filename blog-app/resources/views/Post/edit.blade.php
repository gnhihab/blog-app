@include('errors')

@include('Post.head')

<form class='form-control' method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')


  <div class="card" style="width: 28rem; margin-left:31%; margin-top:25px">

    <div class="card-header">
      Edit Your Post
    </div>

    <ul class="list-group list-group-flush">

        <li class="list-group-item ">User Name
            <select class="form-select" name="user_id" id="">
                <option selected disabled>{{$post->user->name}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </li>


      <li class="list-group-item">Title
        <input type="text" name="title" class="form-control text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}">
      </li>
      <li class="list-group-item">Description
        <textarea name="desc" class="form-control text-dark" style="width: 100%;height: 200px;" id="exampleInputEmail1" aria-describedby="emailHelp">{{$post->desc}}</textarea>
      </li>
      <li class="list-group-item"> Old Image
            <img src="{{asset("storage/$post->image")}}"  alt="image" style="width:260px;hight:280px">
        </li>

        <li class="list-group-item">
        New Image <input type="file" name="image" class="form-control text-black" aria-describedby="emailHelp">
       </li>
    </ul>

    <button type="submit" class="btn btn-success">Submit</button>

</form>

</body>
