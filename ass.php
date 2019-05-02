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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Assignment</title>

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
<link rel="stylesheet" type="text/css" href="countdown-timer/dropzone/dropzone.css" />
<script type="text/javascript" src="countdown-timer/dropzone/dropzone.js"></script>
<script type="text/javascript" src="countdown-timer/upload.js"></script>

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
        <?php
             $id = $_GET['id'];
             $sql = "SELECT * FROM timer WHERE id = '$id'";
             $as = $db->query($sql);

             while($a = mysqli_fetch_array($as)) {
                $date = $a['date'];
                $h = $a['h'];
                $m = $a['m'];
                $s = $a['s'];
                $course = $a['course'];
   				  }

             $names = "SELECT name FROM tbl_asses WHERE id = '$id'";
             $assi = $db->query($names);
             $b = mysqli_fetch_assoc($assi);
         ?>

         <!--fetch data from enrolled_course table-->
         <?php
         $enrolled = "SELECT * FROM `enrolled_courses` WHERE user_name = '$user'";
         $enrolled_results = $db->query($enrolled);
         $data = mysqli_fetch_assoc($enrolled_results);
         ?>

         <!--used again because in first is already assigned-->
         <?php
         $enro = "SELECT * FROM enrolled_courses WHERE user_name = '$user'";
         $enro_results = mysqli_query($db, $enro);
         ?>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="course.php">Home</a></li>
					<li><a href="#course"><?= $b['name']; ?></a></li>

          <!--My course dropdown-->
          <?php if($data['user_name'] == $user){
              echo '<li class="has-dropdown"><a href="#">My Courses</a>
                          <ul class="dropdown">';
              while($da = mysqli_fetch_array($enro_results)){
                  echo '<li><a href="materials.php?id='; echo $da['c_id'];echo '">';echo $da['c_name']; echo '</a></li>';
              }
              echo '</ul>
                  </li>';
          }?>


          <li class="has-dropdown"><a href="#">Libraries</a>
            <ul class="dropdown">
              <li><a href="#">References</a></li>
              <li><a href="#">Past Papers</a></li>
            </ul>
          </li>
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
							<h1 class="white-text"><?= $course; ?></h1>
							<h4 class="white-text"><?= $b['name']; ?>
							</h4>
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
	<div id="course" class="section sm-padding">

		<!-- Container -->
		<div class="container">
			<!-- Row -->
			<div class="row">

			</div>
			<!-- /Row -->
      <?php
      				  while($res = mysqli_fetch_array($result)) {
                   $date = $res['date'];
                   $h = $res['h'];
                   $m = $res['m'];
                   $s = $res['s'];
      				  }
      	?>
      <!-- Data Table area Start-->
      <div class="data-table-area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="data-table-list">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="card text-center">
                                <div class="card-body">
                                  <center><h4>Assesment Submission</h4></center>
                                  <table class="table table-striped">
                                    <tr>
                                    <td >Due date </style></td>
                                    <td><?php echo "<style='font-size:20;'>".$date."</h2></center>"; ?></td>
                                   </tr>
                                    <tr>
                                    <td>Time remaining </style>
                                    <td><div id="demo"></div >
                                    </td>
                                  </tr>
                                  </table>
                                  <br>

                                  <div class="container">
                                <div class="dropzone">
                                  <div class="dz-message needsclick">
                                    <strong>Drop files here or click to upload.</strong><br />
                                  </div>
                                </div>
                              </div>
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
	<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
  <script>
  var countDownDate = <?php
  echo strtotime("$date $h:$m:$s" ) ?> * 1000;
  var now = <?php echo time() ?> * 1000;
  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get todays date and time
      // 1. JavaScript
      // var now = new Date().getTime();
      // 2. PHP
      now = now + 1000;

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          minutes + "m " + seconds + "s ";

      // If the count down is over, write some text
      if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
      }
  }, 1000);
  </script>

</body>

</html>
