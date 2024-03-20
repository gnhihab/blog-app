
@include('User.head')

<form method="POST" action="{{url("posts/$post->id")}}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')


  <div class="card" style="width: 18rem;">

    <div class="card-header">
      Edit Your Post
    </div>

    <ul class="list-group list-group-flush">

      <li class="list-group-item">Title
        <input type="text" name="title" class="form-control text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}">
      </li>
      <li class="list-group-item">Description
        <input type="text" name="desc" class="form-control text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->desc}}">
      </li>
      <li class="list-group-item"> Old Image
            <img src="{{asset("storage/$post->image")}}"  alt="...">
        New Image <input type="file" name="image" class="form-control text-black" aria-describedby="emailHelp">
       </li>
</ul>
    <button type="submit" class="btn btn-success">Submit</button>

</form>

</body>
