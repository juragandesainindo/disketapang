<table>
<tr>
<th colspan="5">DAFTAR AKTIVITAS USER</th>
</tr>
<tr>
<th colspan="5"></th>
</tr>
    <tr>
        <th><b>NO</b></th>
        <th><b>NAMA USER</b></th>
        <th><b>EMAIL</b></th>
        <th><b>DESKRIPSI</b></th>
        <th><b>TANGGAL</b></th>
    </tr>
    @foreach($data as $key => $item)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach
</table>