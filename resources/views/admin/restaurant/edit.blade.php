<!DOCTYPE html>
<html>
<head>
    <title>Edit Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<h3>Edit Restoran</h3>

<form method="POST" enctype="multipart/form-data" action="/admin/restaurants/{{ $restaurant->id }}">
    @csrf
    @method('PUT')
    <input class="form-control mb-2" name="name" value="{{ $restaurant->name }}">
    <input class="form-control mb-2" name="location" value="{{ $restaurant->location }}">
    <textarea class="form-control mb-2" name="description">{{ $restaurant->description }}</textarea>

    @if($restaurant->image)
        <img src="{{ asset('storage/'.$restaurant->image) }}" width="120" class="mb-2"><br>
    @endif

    <input type="file" class="form-control mb-2" name="image">
    <button class="btn btn-success">Update</button>
</form>
</body>
</html>
