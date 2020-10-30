<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Findit - @yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <x-nav/>
  <div class="container index">
  @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>