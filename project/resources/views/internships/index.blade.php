<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internships</title>
</head>

<body>
    <h1>Internships</h1>

    @foreach($internships as $internship)
    <h3><a href="/internship/{{ $internship->id }}">{{ internship->title }}</a></h3>
    @endforeach

</body>

</html>