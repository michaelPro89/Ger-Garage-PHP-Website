<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Ger Garage</title>

  <meta name="description" content="Project">
  <meta name="author" content="Michal Switala">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- bootstrap 4 CSS MATERIAL Designloaded from CDN -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- your stylesheets here -->
  <link href="css/styles.css" rel="stylesheet" />


</head>

<body>

  <!-- HEADER ---------------------------------------------->
  <header>

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top ">


      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- wrapper for collapsing nav bar -->
      <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">

        <ul class="navbar-nav ">

          <li class="nav-item ml-3">
            <button class="btn btn-warning active" type="button" onclick="location.href='index.php'">Home</button>
          </li>
          <li class="nav-item ml-3">
            <button class="btn btn-warning " type="button" onclick="location.href='about.php'">About</button>
          </li>
          <li class="nav-item ml-3">
            <button class="btn btn-warning " type="button" onclick="location.href='pricelist.php'">Price list</button>
          </li>
          <li class="nav-item ml-3">
            <button class="btn btn-warning" type="button" onclick="location.href='booking.php'">Booking</button>
          </li>

          <li class="nav-item ml-3">
            <button class="btn btn-warning " type="button" onclick="location.href='login.php'">Log in</button>
          </li>

        </ul>

      </div><!-- END: menu collapse wrapper-->

    </nav>

  </header>



  <!--- change to container-fluid for full width -->
  <div class="container margin-top-6">
    <div class="row">

      <!--- First column of the row -->
      <div class="col-md text-center mt-3">
        <div>
          <p>
            Welcome to Gers' Garage Website! <br>
            To make a quick booking click the logo below!
          </p>
        </div>
      </div>

      <!-- Force next columns to break to  a new line -->
      <div class="w-100"></div>

      <!--- Second column of the row -->
      <!-- "mt-3" stands for top space between containers -->
      <div class="col-sm text-center">
        <!-- Logo -->
        <div>
          <a href="booking.php">
            <img src="img/logo.png" alt="logo" class="logo animation">
          </a>
        </div>
      </div>

    </div>
  </div>

  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
