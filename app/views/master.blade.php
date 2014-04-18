<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_token() ?>">

    @yield('css')

  </head>
  <body>
    @yield('content')
    @yield('modals')
    @yield('javascript')
  </body>
</html>

