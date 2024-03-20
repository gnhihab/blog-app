@include('success')

@include('User.head')

<form action="{{ url('filter') }}" method="get">


    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">from</span>
        <input type="date" name="from" value="{{request()->input('from')}}" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-sm">

    </div>


    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">to</span>
        <input type="date" name="to" value="{{request()->input('to')}}" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-sm">
    </div>

    <button type="submit" class="btn btn-info mb-2">submit</button>

    @if ($posts->isEmpty())
        <p>No posts found</p>
    @endif


</form>

<form action="{{ route('search') }}" method="post">
    @csrf
    <input type="text" id="" name="key" value = "{{request()->input('key')}}" class="forom-control"
        placeholder="Search ...">
    {{-- value = {{ session('search_query')}}
    {{old('key')}}--}}

    @if ($posts->isEmpty())

        <p>No posts found</p>

    @endif

    <button type="submit" class="btn btn-info">search</button>

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
                <td>{{ $post->desc }}</td>

                <td><img src="{{ asset("storage/$post->image") }}" width="100px" alt="" srcset="">
                </td>
                <td>
                    <a href="{{ url("user/profile/$post->user_id") }}">{{ $post->user->name }}</a>
                </td>
                <td>{{ $post->created_at }}</td>

                <td>
                    <h1>
                        <a class="btn btn-success" href="{{ url("posts/edit/$post->id") }}">Edit</a>
                    </h1>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$post->id}}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="text-dark" id="exampleModalLabel">Confirm Deletion</h5>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark">Are you sure you want to delete this post?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger confirmDeleteBtn" data-id="{{ $post->id }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                    integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+CE8VMtDkudXYrXj2Qm4f/0J2E+8t4z/0W1Kvk5"
                    crossorigin="anonymous">

                        $(document).ready(function() {

                            $('.confirmDeleteBtn').click(function() {
                                var postId = $(this).data('id');

                                $.ajax({
                                    url: '/posts/' + postId,
                                    type: 'DELETE',

                                    success: function(response) {
                                        console.log(response.message);
                                        // Optionally, update the UI or perform other actions
                                        $('#deleteModal').modal('hide');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error deleting item:', error);
                                        // Handle errors
                                    }
                                });
                            });
                        });

                    </script>

                    {{-- <form action="{{ url("posts/$post->id") }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}

                </td>

            </tr>
        @endforeach

    </tbody>

</table>
<div class="d-grid gap-2">

    <h1>
        <a class="btn btn-primary" href="{{ url('posts/create') }}">Create Your New Post</a>
    </h1>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>
