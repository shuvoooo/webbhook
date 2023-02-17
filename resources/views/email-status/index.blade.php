<table border="1" cellpadding="0" cellspacing="0">
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
