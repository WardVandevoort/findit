<<<<<<< HEAD
<<<<<<< HEAD
@extends('layouts/indexLayout')
||||||| d10cfb6
<!DOCTYPE html>
<html lang="en">
=======
@extends('layouts/app')
@extends('layouts/homeLayout')
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca
||||||| d10cfb6
<!DOCTYPE html>
<html lang="en">
=======
@extends('layouts/app')
@extends('layouts/homeLayout')
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca

<<<<<<< HEAD
<<<<<<< HEAD
@section('title')
Home
@endsection
||||||| d10cfb6
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
=======
@section('content')
<div class="search-containter">
    <h1>Stageplaatsen</h1>
    <p>{{$internships->count()}} Stageplaats(en)</p>
    @if ($internships->count() > 0)
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca
||||||| d10cfb6
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
=======
@section('content')
<div class="search-containter">
    <h1>Stageplaatsen</h1>
    <p>{{$internships->count()}} Stageplaats(en)</p>
    @if ($internships->count() > 0)
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca

<<<<<<< HEAD
<<<<<<< HEAD
@section('content')
<h1>Home</h1>
||||||| d10cfb6
<body>
    <h1>hoi</h1>
</body>
=======
    @foreach($internships as $internship)
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
            </div>
            <div class="card-body">
                <p>{{ $internship->bio }}</p>
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca
||||||| d10cfb6
<body>
    <h1>hoi</h1>
</body>
=======
    @foreach($internships as $internship)
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
            </div>
            <div class="card-body">
                <p>{{ $internship->bio }}</p>
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca

<<<<<<< HEAD
<<<<<<< HEAD
<a class="btn btn-primary" href="/students" >Students</a>
<a class="btn btn-primary" href="/internships" >Internships</a>
<a class="btn btn-primary" href="/companies" >Companies</a>

@endsection
||||||| d10cfb6
</html>
=======
            </div>

        </div>
    </div>
    @endforeach

    @else
    <div>geen stageplaatsen beschikbaar</div>
    @endif

</div>
@endsection
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca
||||||| d10cfb6
</html>
=======
            </div>

        </div>
    </div>
    @endforeach

    @else
    <div>geen stageplaatsen beschikbaar</div>
    @endif

</div>
@endsection
>>>>>>> 7994d7e4daf7fda6d4ba6495f102d43381f321ca
