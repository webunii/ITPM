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

	<title>Lectures | Assignments</title>

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
             $sql = "SELECT * FROM courses WHERE id = $id";
             $courses = $db->query($sql);
             $c = mysqli_fetch_assoc($courses);
         ?>


                <!--fetch data from enrolled_course table-->
                <?php
                $enrolled = "SELECT * FROM enrolled_courses WHERE user_name = '$user'";
                $enrolled_results = mysqli_query($db, $enrolled);
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
					<li><a href="#course"><?= $c['c_code'].' - '.' '.$c['c_name']; ?></a></li>


                    <!--this will get all the enrolled courses-->
                    <?php if ($data['user_name'] == $user) {
                        echo '<li class="has-dropdown"><a href="#">My Courses</a>
                            <ul class="dropdown">';
                        while ($da = mysqli_fetch_array($enro_results)) {
                            echo '<li><a href="materials.php?id='; echo $da['c_id']; echo '">'; echo $da['c_name']; echo '</a></li>';
                        }
                        echo '</ul>
                    </li>';
                    } ?>



          <li class="has-dropdown"><a href="#">Libraries</a>
            <ul class="dropdown">
              <li><a href="countdown-timer">References</a></li>
              <li><a href="#">Past Papers</a></li>
            </ul>
          </li>
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
          <li>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
                  <span class="fa fa-bell"></span></a>
                <ul class="dropdown-menu"></ul>
              </li>
            </ul>
          </li>
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
							<h1 class="white-text"><?= $c['c_code'].' - '.' '.$c['c_name']; ?></h1>
							<h4 class="white-text">Lecture Incharge : Mr/Ms. <?= $c['c_incharge']; ?>
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
      <input type="hidden" name="mc_code" value="<?php echo $c['c_name']; ?>">
      <?php $ecourse = $c['c_name'];
      $sql = "SELECT * FROM tbl_file WHERE course = '$ecourse'";
      $cour = $db->query($sql);
      $sql1 = "SELECT * FROM tbl_asses WHERE course = '$ecourse'";
      $ass = $db->query($sql1);
       ?>
			<!-- Row -->
			<div class="row">

			</div>
			<!-- /Row -->
      <!-- Data Table area Start-->
      <div class="data-table-area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="data-table-list">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="card text-center">
                                <div class="card-body">
                                  <h5 class="card-title">Lectures</h5>
                                  <div class="table-responsive">
                                      <table id="data-table-basic" class="table table-striped">
                                          <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">File</th>
                                                <th class="text-center">View</th>
                                                <th class="text-center">Download</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php while ($l = mysqli_fetch_assoc($cour)) {
                                              ?>
                                                <tr>
                                                <td><?= $l['name']; ?></td>
                                                <td><?= $l['image']; ?></td>
                                                <td><a href="Admin/Lecturer/lecs/upload/<?php echo $l['image']; ?>" target="_blank">View</a></td>
                                                <td><a href="Admin/Lecturer/lecs/upload/<?php echo $l['image']; ?>" download>Download</td></tr>
                                              </tr>
                                            <?php } ?>
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- <a href="lecs/index.php" class="btn btn-primary">Click Here</a> -->
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="card text-center">
                                <div class="card-body">
                                  <h5 class="card-title">Assignments</h5>
                                  <div class="table-responsive">
                                      <table id="data-table-basic" class="table table-striped">
                                          <thead>
                                            <tr>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Assignment</th>
                                                <th class="text-center">Download</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php while ($l = mysqli_fetch_assoc($ass)) {
                                              ?>
                                                <tr>
                                                <td><a href="ass.php?id=<?= $l['id']; ?>"><?= $l['name']; ?></a></td>
                                                <td><?= $l['file']; ?></td>
                                                <td><a href="Admin/Lecturer/assignments/upload/<?php echo $l['file']; ?>" download>Download</td></tr>
                                              </tr>
                                            <?php } ?>
                                          </tbody>
                                      </table>
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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
