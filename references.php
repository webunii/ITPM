<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once("user_status.php");

include('db/dbcon.php');
?>
<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>References</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- Owl Carousel -->
  <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
  <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

  <!-- Magnific Popup -->
  <link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />
  <!-- Favicon -->
  <link rel="icon" href="img/favicon.ico">

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="css/style.css" />

  <!--    hover stylesheet-->
  <link type="text/css" rel="stylesheet" href="css/hover.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>

<body>
  <!-- Header -->
  <header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./img/background1.jpg');">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
      <div class="container">

        <div class="navbar-header">
          <!-- Logo -->
          <div class="navbar-brand">
            <a href="index.html">
              <img class="logo" src="img/favicon.ico" alt="logo">
              <img class="logo-alt" src="img/logo.png" alt="logo">
            </a>
          </div>
          <!-- /Logo -->

          <!-- Collapse nav button -->
          <div class="nav-collapse">
            <span></span>
          </div>
          <!-- /Collapse nav button -->
        </div>
        <?php if (logged_in()==true) {
          $user = $_SESSION['username'];
        }
        $u = "select * from student where username = '$user'";
        $result = $db->query($u); ?>

        <!--  Main navigation  -->
        <ul class="main-nav nav navbar-nav navbar-right">
          <li><a href="main.php">Home</a></li>
          <li><a href="#ref">References</a></li>
          <?php while ($d = mysqli_fetch_assoc($result)) { ?>
            <li class="has-dropdown"><a href="#">Hello, &nbsp;<?= $d['fname'].' '.' '.$d['lname']; ?></a>
              <ul class="dropdown">
                <li><a href="userprofile.php">User Profile</a></li>
                <li>
                  <a href="https://mail.google.com" target="_blank">
                    Student Email</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                  </ul>
                </li>
              <?php } ?>

            </ul>
            <!-- /Main navigation -->

          </div>
        </nav>
        <!-- /Nav -->

        <!-- home wrapper -->
        <div class="home-wrapper">
          <div class="container">
            <div class="row">

              <!-- home content -->
              <div class="col-md-10 col-md-offset-1">
                <div class="home-content">
                  <h1 class="white-text">References</h1>
                </div>
              </div>
              <!-- /home content -->

            </div>
          </div>
        </div>
        <!-- /home wrapper -->

      </header>
      <!-- /Header -->

      <!-- Contact -->
      <div id="ref" class="section md-padding">

        <!-- Container -->
        <div class="container">

          <?php
          $sql = "SELECT * FROM tbl_books";
          $courses = $db->query($sql);
          ?>
          <!-- Row -->
          <div class="row">

          </div>
          <!-- Data Table area Start-->
          <div class="data-table-area">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="data-table-list">
                    <div class="row">
                      <!-- <div class="col-sm-1"></div> -->
                      <div class="col-sm-12">
                        <div class="card text-center">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table id="data-table-basic" class="table table-striped">
                                <thead>
                                  <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">File</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Download</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php while ($l = mysqli_fetch_assoc($courses)) { ?>
                                    <tr>
                                      <td><?= $l['name']; ?></td>
                                      <td><?= $l['image']; ?></td>
                                      <td><?= $l['course']; ?></td>
                                      <td><a href="Admin/Lecturer/books/upload/<?php echo $l['image']; ?>" target="_blank">View</a></td>
                                      <td><a href="Admin/Lecturer/books/upload/<?php echo $l['image']; ?>" download>Download</td></tr>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- <a href="lecs/index.php" class="btn btn-primary">Click Here</a> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br><br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Data Table area End-->
          </div>
        </div>
        <!-- /Container -->

      </div>
      <!-- /Contact -->


      <!-- Footer -->
      <footer id="footer" class="sm-padding bg-dark">

        <!-- Container -->
        <div class="container">

          <!-- Row -->
          <div class="row">

            <div class="col-md-12">

              <!-- footer copyright -->
              <div class="footer-copyright">
                <p>Copyright © 2019. All Rights Reserved.</p>
              </div>
              <!-- /footer copyright -->

            </div>

          </div>
          <!-- /Row -->

        </div>
        <!-- /Container -->

      </footer>
      <!-- /Footer -->

      <!-- Back to top -->
      <div id="back-to-top"></div>
      <!-- /Back to top -->

      <!-- Preloader -->
      <div id="preloader">
        <div class="preloader">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <!-- /Preloader -->

      <!-- jQuery Plugins -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
      <script type="text/javascript" src="js/main.js"></script>


    </body>

    </html>
