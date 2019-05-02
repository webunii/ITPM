<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once("user_status.php");
include('db/dbcon.php');

//session timeout condition
if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php
    header('Location: logout2.php'); //change yoursite.com to the name of you site!!
} else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}
?>
<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Profile</title>
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

  <script>
  function FidError()
  {
    var fname = document.forms["Note"]["fname"];
    var lname = document.forms["Note"]["lname"];
    var email = document.forms["Note"]["email"];
    var contact = document.forms["Note"]["contact"];
    var letter = /^[A-Za-z]+$/;
    var num = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    var mail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


    if (fname.value == "")
    {
      window.alert("Please enter first name.");
      return false;
    }

    if (lname.value == "")
    {
      window.alert("Please enter last name.");
      return false;
    }

    if (email.value == "")
    {
      window.alert("Please enter Email.");
      return false;
    }

    if (contact.value == "")
    {
      window.alert("Please enter Contact number.");
      return false;
    }
    //letter validation
    if(!(fname.value.match(letter)) || !(lname.value.match(letter))){
      alert('Please enter letters for name');
      return false;
    }

    //Integers validation for numbers
    if(contact.value.match(letter)){
      alert('Please enter numbers for phone number');
      return false;
    }

    //number validation
    if(!(contact.value.match(num))){
      alert('Please enter a valid number!');
      return false;
    }

    //email validation
    if(!(email.value.match(mail))){
      alert("Enter a valid Email!");
      return false;
    }

    return true;
    Note.submit();
  }</script>


</head>

<body>
  <!-- Header -->
  <header id="home">
    <!-- Background Image -->
    <div class="bg-img">
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

          <?php while ($d = mysqli_fetch_assoc($result)) { ?>
            <li class="has-dropdown"><a href="#">Hello, &nbsp;<?= $d['fname'].' '.' '.$d['lname']; ?></a>
              <ul class="dropdown">
                <li><a href="#">User Profile</a></li>
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

        <?php
        $sql="select * from student where username = '$user'";
        $record=mysqli_query($db,$sql);
        $check=mysqli_fetch_array($record);
        ?>

        <!-- home wrapper -->
        <div class="home-wrapper">
          <div class="container">
            <div class="row">
              <!-- home content -->
              <div class="col-md-10 col-md-offset-1">
                <div class="home-content">
                  <form method="post" class="form-horizontal" role="form" name="Note" onsubmit="return FidError()" id="Note" action="update.php">

                    <div class="form-group">
                      <br>
                      <h1 class="text-center"><img src="img/user.png" width="150px" height="150px"></h1>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 white-text" for="username">User Name: </label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo $check['username']?>" autocomplete="off" disabled>
                      <span class="c_code-validation validation-error"></span></div>
                    </div>
                    <div class="col-sm-1"></div>
                          <div class="form-group">
                            <label class="control-label col-sm-2 white-text" for="fname">First Name: </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="fname" name="fname" value="<?= $check['fname']?>" autocomplete="off">
                            <span class="c_code-validation validation-error"></span></div>
                          </div>
                          <div class="col-sm-1"></div>
                          <div class="form-group">
                            <label class="control-label col-sm-2 white-text" for="lname">Last Name: </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $check['lname']?>" autocomplete="off">
                            <span class="c_code-validation validation-error"></span></div>
                          </div>
                          <div class="col-sm-1"></div>
                          <div class="form-group">
                              <label class="control-label col-sm-2 white-text" for="email">Email:</label>
                              <div class="col-sm-5">
                                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $check['email']?>" autocomplete="off"></div>
                          </div>
                          <div class="col-sm-1"></div>
                          <div class="form-group">
                              <label class="control-label col-sm-2 white-text" for="contact">Contact Number:</label>
                              <div class="col-sm-5">
                                  <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $check['phone']?>" autocomplete="off"></div>
                          </div>
<div class="col-sm-1"></div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-3 m-t-15">
                            <input type="hidden" name="id" value="<?php echo $check['id']?>">
                          <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Update</button>
                          <button class="btn btn-default"><a href="userprofile.php"><span class="glyphicon glyphicon-remove"></span> Cancel</a></button>
                        </div>
                      </div>

                  </form>
                </div>
              </div>
              <!-- /home content -->

            </div>
          </div>
        </div>
        <!-- /home wrapper -->

      </header>
      <!-- /Header -->




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
