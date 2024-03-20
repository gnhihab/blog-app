@include('errors')

@include('User.head')

<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
    @csrf

    <div class="card" style="width: 18rem;">


        <div class="card-header">
            Crerate Your Post
        </div>
        <ul class="list-group list-group-flush">
        <li>

        <label for="exampleInputEmail1">your name</label>
        <select name="user_id" id="">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        </li>

        <li>Post Title
            <input type="text" name="title" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
        </li>

        <li>Post Desc
            <textarea type="text" name="desc" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc"></textarea>
        </li>

        <li>post Image
            <input type="file" name="image" class="form-control text-black" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
        </li>

        <button type="submit" class="btn btn-primary">Submit</button>
        </ul>


</form>

</body>
