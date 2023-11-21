<!DOCTYPE html>
<html lang="US">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Disability
    </title>
    @include('website.layout.style')
    @stack('styles')
</head>
<body>
@include('website.layout.header')
@yield('content')
@include('website.layout.footer')
@include('website.layout.script')
@stack('scripts')
</body>
</html>
