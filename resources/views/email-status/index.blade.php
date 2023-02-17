<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col mt-3">
            <table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>To Email</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->to_email }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $data->links() }}
        </div>
    </div>
</div>


</body>
</html>

