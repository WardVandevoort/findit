<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    <h1>Students</h1>

    @foreach( $students as $student )
    <h3><a href="/students/{{ $student->id }}">{{ $student->firstname . ' ' . $student->lastname }}</a></h3>
    @endforeach

</body>

</html>