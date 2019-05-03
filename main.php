  <!DOCTYPE html>
  <html lang="en">
  <?php
  session_start();
  require_once("user_status.php");

//  check session time
  $_SESSION['logged_in'] = true; //set you've logged in
  $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
  $_SESSION['expire_time'] = 100; //expire time in seconds: three hours (you must change this)

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

    <title>WebUni Institute</title>

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
<!--  <script type="text/javascript">start_countdown();</script>-->
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

          <?php

          $not = "select * from notification";
          $result2 = $db->query($not);
          $n = "select * from notification where status = 0";
          $result1 = $db->query($n);
          $num = mysqli_num_rows($result1);

          if (isset($_GET['notf'])) {
            $n_id = $_GET['notf'];
            $up = "UPDATE notification SET status = '1' WHERE id = '$n_id'";
            $db->query($up);
            header('location:main.php');
          }

          ?>

          <?php if (logged_in()==true) {
            $user = $_SESSION['username'];
          }

          $u = "select * from student where username = '$user'";
          $result = $db->query($u); ?>


            <!--fetch data from enrolled_course table-->
            <?php
            $enrolled = "SELECT * FROM enrolled_courses WHERE user_name = '$user'";
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
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#testimonial">Notices</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="course.php">Courses</a></li>

            <!-- My course dropdown -->
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
                <li><a href="references.php">References</a></li>
                <li><a href="papers.php">Past Papers</a></li>
              </ul>
            </li>

            <li><a href="qa.php">Q & A</a></li>

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

                <?php
                $not = "select * from notification ORDER BY id DESC LIMIT 5";
                $result = $db->query($not);
                $n = 'select * from notification where status = 0';
                $result1 = $db->query($n);
                $num = mysqli_num_rows($result1);
                 ?>

                 <?php
                 if (isset($_GET['notf'])) {
                   $n_id = $_GET['notf'];
                   $up = "UPDATE notification SET status = '1' WHERE id = '$n_id'";
                   $db->query($up);
                 }

                  ?>

                <button class="btn btn-danger dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
                  <span class="fa fa-bell"></span>&nbsp;<span class="badge"><?= $num; ?></span></button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <?php while ($notifi = mysqli_fetch_assoc($result)) { ?>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="?notf=<?php echo $notifi['id']; ?>">
                      <?php if($notifi['status'] == 0){
                        $id = $notifi['id'];
                         ?>
                      <p class="alert-danger"><?= '<b>' . $notifi['subject'] . '</b> is the newly added program.<br>You can use ' .
                      '<b>' . $notifi['message'] . '</b> as enrollement key<br>to enroll to this course.'; ?></p>
                     <?php } else { ?>
                       <p><?= '<b class="text-danger">' . $notifi['subject'] . '</b> is the newly added program.<br>You can use ' .
                      '<b class="text-danger">' . $notifi['message'] . '</b> as enrollement key<br>to enroll to this course.'; ?></p>
                        <?php } ?>
                    </a>
                    </li>
                    <?php } ?>
                  </ul>


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
    							<h1 class="white-text">WEBUNI INSTITUTE</h1>
    							<p class="white-text">Replace an empty mind with an open one.</p>
    						</div>
    					</div>
    					<!-- /home content -->

            </div>
          </div>
        </div>
        <!-- /home wrapper -->

      </header>
      <!-- /Header -->

      <!-- About us Us -->
      <div id="about" class="section md-padding bg-grey">

        <!-- Container -->
        <div class="container">

          <!-- Row -->
          <div class="row">

            <!-- About us content -->
    				<div class="col-md-6">
    					<div class="section-header">
    						<h2 class="title">About Us</h2>
    					</div>
    					<p>webuni institute has reached the pinnacle of success by providing formal and professional qualifications to a larger number of local students.
    Despite our growth we have been consistent with our founder's vision of providing satisfactory education this institution has grown into one of the most prospering
    collaboration in the islands. Today we can proudly claim that we offer affordable and most recognized programs with 15 years of excellence.
    </p>
    				</div>
    				<!-- /About us us content -->

            <!-- About slider -->
            <div class="col-md-6">
              <div id="about-slider" class="owl-carousel owl-theme">
                <img class="img-responsive" src="./img/about1.jpg" alt="">
                <img class="img-responsive" src="./img/about2.jpg" alt="">
                <img class="img-responsive" src="./img/about1.jpg" alt="">
                <img class="img-responsive" src="./img/about2.jpg" alt="">
              </div>
            </div>
            <!-- /About slider -->

          </div>
          <!-- /Row -->

        </div>
        <!-- /Container -->

      </div>
      <!-- /About Us -->

      <!-- Testimonial -->
    <div id="testimonial" class="section md-padding">

      <!-- Background Image -->
      <div class="bg-img" style="background-image: url('./img/blog2.jpg');">
        <div class="overlay"></div>
      </div>
      <!-- /Background Image -->

      <!-- Container -->
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- Testimonial slider -->
          <div class="col-md-10 col-md-offset-1">
            <div id="testimonial-slider" class="owl-carousel owl-theme">

              <?php
                $sql5 = "select * from notice";
                $record = $db->query($sql5);
                while($row = mysqli_fetch_assoc($record))
                {
              ?>
              <!-- testimonial -->
              <div class="testimonial  text-center">
                  <h3 class="white-text"><?= $row['subject']; ?></h3>
                  <span>By News Admin - <?= $row['datet']; ?></span>
                <p class="white-text"><?= $row['messageNote']; ?></p>
              </div>
              <!-- /testimonial -->
              <?php } ?>
            </div>
          </div>
          <!-- /Testimonial slider -->

        </div>
        <!-- /Row -->

      </div>
      <!-- /Container -->

    </div>
    <!-- /Testimonial -->

      <!-- Contact -->
      <div id="contact" class="section md-padding">

        <!-- Container -->
        <div class="container">

          <!-- Row -->
          <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
              <h2 class="title">Get in touch</h2>
            </div>
            <!-- /Section-header -->
            <?php
            if(isset($_POST['post'])){
                $comment_subject = $_POST['name'];
                $comment_text = $_POST['message'];

                  $notification = "INSERT INTO comments (comment_subject,comment_text) VALUES ('$comment_subject','$comment_text')";
                  $results = mysqli_query($db, $notification);

                }

             ?>

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-3">
              <form method="post" id="contact-form">
                <div class="form-group col-md-8">
                  <label class="control-label col-sm-2" for="c_code">Name: </label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group col-md-8">
                  <label class="control-label col-sm-2" for="c_code">Message: </label>
                  <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group col-md-8">
                  <input type="submit" name="post" id="post" class="btn btn-info" value="Send message" />
                </div>
              </form>
            </div>
            <!-- /contact form -->

          </div>
          <!-- /Row -->

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

      <script>
  $(document).ready(function(){
    $(".dropdown-toggle").dropdown();
  });
  </script>

    </body>

    </html>
