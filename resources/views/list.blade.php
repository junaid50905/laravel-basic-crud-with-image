<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    <a href="{{ route('create') }}">store an image</a><br>
    <h3>image list</h3>
    <table>
        <tr>
            <td>serial number</td>
            <td>title</td>
            <td>image</td>
            <td>action</td>
        </tr>
        @php
            $sn=1;
        @endphp
        @foreach ($data as $item)
            <tr>
                <td>{{ $sn++ }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    {{-- storage --}}
                    @if(file_exists(storage_path().'/app/public/products/'.$item->image ))

                    {{-- public --}}
                    <img src="{{ asset('storage/products/'.$item->image) }}" height="100">

                    @else
                    Image NAI
                    @endif
                </td>
                <td>
                    <a href="{{ route('edit', $item->id) }}">edit</a>
                    <form action="{{ route('destroy', $item->id)}}" method="POST" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>
</html>
