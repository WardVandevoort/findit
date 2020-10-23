@extends('layouts/app')
@extends('layouts/homeLayout')


@section('content')
<div class="search-containter">
    <h1>zoek resultaten</h1>
    <p> resultaten voor '{{request()->input('query')}}'</p>
    @foreach($internships as $internship)
    <p>{{$internship->title}}</p>
    @endforeach
</div>
@endsection