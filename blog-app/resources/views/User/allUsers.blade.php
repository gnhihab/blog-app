 @include('errors')
@include('success')


<!DOCTYPE html>
<html>

<head>
    <title>User Table</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="vendor/datatables/buttons.server-side.js"></script>

</head>

<body>

    <table id="users-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>number of posts</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>



    <script type="text/javascript">
        $(function() {
            var table = $('#users-table').DataTable({

                processing: true,
                serverSide: true,
                order: [0, "asc"],
                ajax: "{{ route('users') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        render: function(data, type, full, meta) {
                            return '<a href="/user/profile/' + full.id + '">' + data + '</a>';
                        }
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, full, meta) {
                            return moment(data).format('DD-MM-YYYY');
                        }

                    },
                    {
                        data:'posts_num',
                        name:'posts_num',
                        render: function(data, type, full, meta) {
                            return '<a href="/user/profile/' + full.id + '">' + data + '</a>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]
            });
        });
    </script>
</body>

</html>

