@include('errors')

@include('Post.head')

<div style="margin:auto;width:75%;margin-top:30px;padding:40px">

<form method="POST" class=" form-control" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1">User Name</label>

        <select name="user_id" class="form-select" id="">
            <option selected disabled>Select User Name</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Post Title</label>
      <input type="text" name="title" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Post Desc</label>
        <input type="text" name="desc" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Desc">

    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Post Image</label>
        <input type="file" name="image" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Image">

    </div>


    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
</body>
