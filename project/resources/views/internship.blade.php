<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <ul>
        @foreach($internships as $internship)
        <li>{{$internship}}</li>
        @endforeach
    </ul>
</body>

</html>