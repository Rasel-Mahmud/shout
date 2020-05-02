<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Shout</title>
</head>
<body>
  <!-- Head -->
  <div class="header-wrap">
    <div class="container">
      <div class="row">
        <div class="header">
          <h1>Home</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- /Head -->

  <!-- Body -->
  <div class="body-wrap">
    <div class="container">
      
      @yield('form')

      <div class="row">
        <div class="col-md-8 offset-md-2">
          
          @yield('status')

          @yield('body')

        </div>
      </div>
    </div>
  </div>
  <!-- /Body -->

  <script src="{{ asset('js/app.js') }}" defer></script>
   <!-- Bootflat's JS files.-->
</body>
</html>