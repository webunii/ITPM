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
          <li><a href="#course">My Courses</a></li>

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
                  <form method="post" class="form-horizontal" role="form" action="edit.php">

                    <div class="form-group">
                      <br>
                      <h1><img src="img/user.png" width="150px" height="150px"></h1>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 white-text" for="fname">First Name : </label>
                      <div class="col-sm-5">
                        <input class="form-control" id="fname" name="fname" value="<?= $check['fname']?>" autocomplete="off" disabled>
                        <span class="c_code-validation validation-error"></span></div>
                      </div>
                      <div class="col-sm-1"></div>
                      <div class="form-group">
                        <label class="control-label col-sm-2 white-text" for="lname">Last Name : </label>
                        <div class="col-sm-5">
                          <input class="form-control" id="lname" name="lname" value="<?php echo $check['lname']?>" autocomplete="off" disabled>
                          <span class="c_code-validation validation-error"></span></div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="form-group">
                          <label class="control-label col-sm-2 white-text" for="username">User Name : </label>
                          <div class="col-sm-5">
                            <input class="form-control" id="username" name="username" value="<?php echo $check['username']?>" autocomplete="off" disabled>
                            <span class="c_code-validation validation-error"></span></div>
                          </div>
                          <div class="col-sm-1"></div>
                          <div class="form-group">
                            <label class="control-label col-sm-2 white-text" for="email">Email :</label>
                            <div class="col-sm-5">
                              <input class="form-control" id="email" name="email" value="<?php echo $check['email']?>" autocomplete="off" disabled></div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="form-group">
                              <label class="control-label col-sm-2 white-text" for="contact">Contact Number:</label>
                              <div class="col-sm-5">
                                <input class="form-control" id="contact" name="contact" value="<?php echo $check['phone']?>" autocomplete="off" disabled></div>
                              </div>
                              <div class="col-sm-1"></div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-1 m-t-15">
                                  <input type="hidden" name="id" value="<?php echo $check['id']?>">
                                  <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
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

                <?php
                $sql = "SELECT * FROM enrolled_courses WHERE user_name = '$user'";
                $courses = $db->query($sql);
                ?>
                <!-- Contact -->
                <div id="course" class="section md-padding">
                <!-- Container -->
                <div class="container">

                  <!-- Row -->
                  <div class="row">
                    <!-- Section-header -->
                    <div class="section-header text-center">
                      <h2 class="title">My Courses</h2>

                    </div>
                    <!-- /Section-header -->
                  </div>
                  <!-- /Row -->

                  <!-- Data Table area Start-->
                  <div class="data-table-area">
                    <div class="container">
                      <div class="data-table-list">
                        <div class="row">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-6">
                            <div class="table-responsive">
                              <table class="table">
                                <tbody>
                                  <?php while ($cs = mysqli_fetch_assoc($courses)) { ?>
                                    <tr>

                                      <td class="text-center">
                                        <a href="materials.php?id=<?=$cs['c_id']; ?>"><?= $cs['c_code'].' - '.' '.$cs['c_name']; ?></a></td>
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
                    </div>
                  </div>
                  <!-- Data Table area End-->
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
