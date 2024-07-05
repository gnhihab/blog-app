@include('success')

@include('Post.head')

<div class="container">
    <h1 style="margin: 30px">Deleted Posts</h1>
    <table class="table table-dark table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Image</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Deleted_at</th>
                <th>Actions</th>
                <th></th>
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

                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>{{ $post->deleted_at }}</td>
                    <td>
                    <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Restore</button>
                    </form>
                    </td>
                    <td>
                    <form action="{{ route('forceDelete', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Force Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
