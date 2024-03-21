
@include('User.head')

<div class="card" style="width: 24rem; margin-left:31%; margin-top:15px" >
    <div class="card-header">
      User Information
    </div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item">ID : {{$user->id}}</li>
      <li class="list-group-item">Name : {{$user->name}}</li>
      <li class="list-group-item">E-mail : {{$user->email}}</li>
    </ul>

</div>

<div class="container text-center" >
    <div class="row aligan-right " style="margin-top:20px">

        @foreach ($user->posts as $post)
            <div class="col-md-4">
                <div class="card" style="">
                    <div class="card-header">
                        Post ID: {{$post->id}}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Title: {{$post->title}}</li>
                        <li class="list-group-item">Description: {{$post->desc}}</li>
                        <li class="list-group-item">Image: <img src="{{ asset("storage/$post->image") }}" class="card-img-top" alt=""></li>
                        <li class="list-group-item">Created_at: {{$post->created_at}}</li>
                        <li class="list-group-item">Updated_at: {{$post->updated_at}}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>