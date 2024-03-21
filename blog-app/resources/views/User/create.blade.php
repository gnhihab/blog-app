@include('errors')

@include('User.head')

<form method="POST" class=" form-control" action="{{ route('store') }}" enctype="multipart/form-data">
    @csrf

    <div class="card " style="width: 24rem; margin-left:31%; margin-top:40px">


        <div class="card-header">
            Crerate Your Post
        </div>
        <ul class="list-group list-group-flush">

        <li class="list-group-item">

        <label for="exampleInputEmail1">User Name</label>

        <select name="user_id" id="">
            <option selected disabled>Select User Name</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        </li>

        <li class="list-group-item">Post Title
            <input type="text" name="title" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
        </li>

        <li class="list-group-item">Post Desc
            <textarea type="text" name="desc" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc"></textarea>
        </li>

        <li class="list-group-item">post Image
            <input type="file" name="image" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
        </li>

        <button type="submit" class="btn btn-success">Submit</button>

        </ul>


</form>

</body>
