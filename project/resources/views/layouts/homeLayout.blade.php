<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>


    <form class="form-group" type="get" action="{{url('/')}}">
        <input class="form-control" name="query" type="search" placeholder="zoek stageplaats" value="{{request()->input('query')}}">
        <button class="btn btn-primary" type="submit">Zoek</button>
    </form>
    <div class="container index">
    </div>
</body>

</html>