@include('errors')

@include('Post.head')

<form class='form-control' method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')


  <div class="card" style="width: 28rem; margin-left:31%; margin-top:25px">

    <div class="card-header">
      Edit User Info
    </div>

    <ul class="list-group list-group-flush">

        <li class="list-group-item ">User Name
            <input name="name" value="{{$user->name}}" class="form-control text-dark"id="exampleInputEmail1">
        </li>

        <li class="list-group-item">E-mail
            <input name="email" value="{{$user->email}}" class="form-control text-dark"id="exampleInputEmail1">
        </li>

    </ul>

    <button type="submit" class="btn btn-success">Submit</button>

</form>

</body>