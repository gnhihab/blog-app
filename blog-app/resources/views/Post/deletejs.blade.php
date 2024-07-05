
@include('Post.head')

<script>
    src = "https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js"
</script>

<script>

        function deletePost(postId){

            console.log("post id : "+postId);

            $.ajax({
                url: ' {{ route('posts.destroy', ":id") }} '.replace(':id',postId),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    console.log(response.message);

                    $('#deleteModal').modal('hide');
                    location.reload();
                },
                error: function(xhr, error) {
                    console.error('Error deleting post:', error);

                }

            });

        };

</script>