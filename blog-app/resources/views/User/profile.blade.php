
@include('User.head')

<div class="card" style="width: 18rem;">
    <div class="card-header">
      User Information
    </div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item">ID : {{$user->id}}</li>
      <li class="list-group-item">Name : {{$user->name}}</li>
      <li class="list-group-item">E-mail : {{$user->email}}</li>
    </ul>

</div>

<div class="card" style="width: 18rem;">

    <div class="card-header ">
        User Posts
    </div>

    @foreach ($user->posts as $post)
       <ul class="list-group list-group-flush">

            <li class="list-group-item">Post ID : {{$post->id}}</li>
            <li class="list-group-item">Title : {{$post->title}}</li>
            <li class="list-group-item">Description : {{$post->desc}}</li>
            <li class="list-group-item">Image :
                <img src="{{ asset("storage/$post->image") }}" class="card-img-top" alt=""></li>
            <li class="list-group-item">Created_at : {{$post->created_at}}</li>
            <li class="list-group-item">Updated_at : {{$post->updated_at}}</li>
       </ul>
    @endforeach

</div>

