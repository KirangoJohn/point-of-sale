<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    @foreach ($orders as $item)
    <p>{{ $item->id }}</p>
</body>
</html>