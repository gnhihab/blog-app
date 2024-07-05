@include('success')

@include('Post.head')


<div style="text-align:center;margin:20px;display: flex;justify-content: space-between;">

    {{-- <h1>
         <a class="btn btn-success btn-lg" href="{{ route('posts.export') }}">Download Posts</a>
    </h1> --}}

    <h1>
        <a class="btn btn-info btn-lg" href="{{ route('users') }}">Users Information</a>
    </h1>

    <h1>
        <a class="btn btn-primary btn-lg" href="{{ url('posts/create') }}">Create Your New Post</a>
    </h1>

    <h1>
        <a class="btn btn-secondary btn-lg" href="{{ route('deleted') }}">Deleted Posts</a>
    </h1>

</div>



<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 30px;
    }

    .input-group {
        margin-right: 100px;
    }

    .form-control {

        width: 200px;
    }
</style>


<form action="{{ url('filter') }}" method="get">
    @csrf
    <div class="container">

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">from</span>
            <input type="date" name="from" value="{{ request()->input('from') }}" class="form-control"
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

        </div>


        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">to</span>
            <input type="date" name="to" value="{{ request()->input('to') }}" class="form-control"
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <button type="submit" class="btn btn-info mb-2">submit</button>

    </div>

</form>

@if ($posts->isEmpty())
<div class="alert alert-warning" role="alert">
    <p>No posts found</p>
</div>
@endif

<form action="{{ route('search') }}" method="post" style="margin-left:40px; margin-right: 200px">
    @csrf
    <div class="input-group mb-5">
        <input type="text" name="key" value = "{{ request()->input('key') }}" class="form-control"
            placeholder="Search ..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
    </div>

</form>



{{-- {{$posts->links('pagination::bootstrap-4')}} --}}


<table class="table table-dark table-striped mt-2">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Desc</th>
            <th scope="col">Image</th>
            <th scope="col">User Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td style="max-width: 200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                    {{ $post->desc }}</td>

                <td><img src="{{ asset("storage/$post->image") }}" width="100px" alt="" srcset="">
                </td>
                <td>
                    <a href="{{ url("user/profile/$post->user_id") }}">{{ $post->user->name }}</a>
                </td>
                <td>{{ $post->created_at }}</td>

                <td>
                    <h1>
                        <a class="btn btn-success" href="{{ url("posts/$post->id/edit") }}">Edit</a>
                    </h1>

                    {{-- <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{ $post->id }}" data-id="{{ $post->id }}">
                        Delete
                    </button>

                </td>

            </tr>
        @endforeach

    </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-dark" id="exampleModalLabel">Confirm Deletion</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark">Are you sure you want to delete this post?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <button type="button" onclick="deletePost({{ $post->id }})"
                    class="btn btn-danger DeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

@include('Post.deletejs')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</body>

</html>
