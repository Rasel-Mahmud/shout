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
      <div class="row">
        <div class="col-md-8 offset-md-2">

          <form action="" id="statusform">
            <textarea name="statusarea" class="form-control" id="statusarea"></textarea>
            <input type="submit" class="btn btn-primary" value="Post">
          </form>

        </div>
      </div>

      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card-wraper">

            <div class="status-card">
              <div class="card-image">
                <img src="http://bootflat.github.io/img/photo-4.jpg" alt="">
              </div>
              <div class="status-content">
                <p class="name">Name</p>
                <p class="date">02-05-2020</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam beatae dolore quod eligendi sint sit eum. Eveniet id deleniti sed? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam beatae dolore quod eligendi sint sit eum. Eveniet id deleniti sed? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam beatae dolore quod eligendi sint sit eum. Eveniet id deleniti sed? </p>
              </div>
            </div>


            <div class="status-card">
              <div class="card-image">
                <img src="http://bootflat.github.io/img/photo-4.jpg" alt="">
              </div>
              <div class="status-content">
                <p class="name">Name</p>
                <p class="date">02-05-2020</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam beatae dolore quod eligendi sint sit eum. Eveniet id deleniti sed? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam beatae dolore quod eligendi sint sit eum. Eveniet id deleniti sed? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam beatae dolore quod eligendi sint sit eum. Eveniet id deleniti sed? </p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Body -->

  <script src="{{ asset('js/app.js') }}" defer></script>
   <!-- Bootflat's JS files.-->
</body>
</html>