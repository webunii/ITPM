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

  <title>Courses</title>

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
          <li><a href="#course">Courses</a></li>
          <li><a href="mycourse.php">My Courses</a></li>
          <li class="has-dropdown"><a href="#">Libraries</a>
            <ul class="dropdown">
              <li><a href="#">References</a></li>
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
                <span class="glyphicon glyphicon-bell"></span>&nbsp;<span class="badge"><?= $num; ?></span></button>
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
                  <h1 class="white-text">Courses</h1>
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

      <!-- Contact -->
      <div id="course" class="section md-padding">

        <!-- Container -->
        <div class="container">

          <!-- Row -->
          <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
              <h2 class="title">Courses</h2>
              <!--        Hover Search bar-->
  <form method="post" name="search_bar">
      <input type="search" placeholder="search.." name="search" id="search">
      <i class="fa fa-search"></i>
  </form>
  <!--End of Hover search bar-->
            </div>
            <!-- /Section-header -->

          </div>
          <!-- /Row -->

          <?php
          $sql = "SELECT * FROM courses";
          $courses = $db->query($sql);
          ?>
            <!-- Data Table area Start-->
            <div class="data-table-area">
              <div class="container">
                    <div class="data-table-list">
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                              <div class="table-responsive">
                                <table id="courseTable" class="table table-striped">
                                  <tbody>
                                    <?php while ($cs = mysqli_fetch_assoc($courses)) { ?>
                                    <tr>

                                      <td class="text-center">
                                        <a href="materials.php?id=<?=$cs['id']; ?>"><?= $cs['c_code'].' - '.' '.$cs['c_name']; ?></a></td>

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

        <script>
        $(document).ready(function(){
          $(".dropdown-toggle").dropdown();
        });
      </script>

      <script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            search_table($(this).val());
        });

        function search_table(value){
            $('#courseTable').each(function (){
               var found = 'false';
               $(this).each(function () {
                  if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0 )
                  {
                      found = 'true';
                  }
               });
               if(found == 'true'){
                   $(this).show();
               }else {
                   $(this).hide();
               }
            });
        }
    });
</script>

    </body>

    </html>
