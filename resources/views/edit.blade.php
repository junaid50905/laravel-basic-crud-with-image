<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Edit value</h3>

    <form action="{{ route('update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" value="{{ $data->title }}">
        {{-- public --}}
        <img src="{{ asset('storage/products/'.$data->image) }}" height="100">

        <input type="file" name="image">
        <button type="submit">update</button>
    </form>

</body>
</html>
