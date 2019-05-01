<!doctype html>
<html class="no-js" lang="">
<?php
session_start();
require_once("../admin_status.php");

include('db/dbcon.php');
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Lecturer | Home</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
  ============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
  ============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
  ============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Bootstrap CSS
  ============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
  ============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- meanmenu CSS
  ============================================ -->
  <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
  <!-- animate CSS
  ============================================ -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
  ============================================ -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- mCustomScrollbar CSS
  ============================================ -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- jvectormap CSS
  ============================================ -->
  <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
  <!-- notika icon CSS
  ============================================ -->
  <link rel="stylesheet" href="css/notika-custom-icon.css">
  <!-- wave CSS
  ============================================ -->
  <link rel="stylesheet" href="css/wave/waves.min.css">
  <!-- main CSS
  ============================================ -->
  <link rel="stylesheet" href="css/main.css">
  <!-- style CSS
  ============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
  ============================================ -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
  ============================================ -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>

  <style>
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }
</style>
</head>

<body>
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <?php include 'include/header_top.php';
  ?>

  <?php if (logged_in()==true) {
    $e = $_SESSION['email'];
  }
  $s = "select * from user where email = '$e'";
  $result = $db->query($s); ?>


  <!-- Mobile Menu start -->
  <div class="mobile-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="mobile-menu">
            <nav id="dropdown">
              <ul class="mobile-menu-nav">
                <?php while ($c = mysqli_fetch_assoc($result)) {
                  $name = $c['fname'];
                  ?>
                  <li><a data-toggle="collapse" data-target="#log" href="#"><?= $c['fname'].' '.' '.$c['lname']; ?></a>
                    <ul class="collapse dropdown-header-top">
                      <li><a href="#">My Profile</a></li>
                      <li><a href="../../logout.php">Sign Out</a></li>
                    </ul>
                  </li>
                  <li><a href="index.php"><i class="notika-icon notika-house"></i> Home</a>
                  </li>
                  <li><a href="mycourse.php"><i class="notika-icon notika-edit"></i> My Courses</a>
                  </li>
                  <li><a href="lecs/new_add.php"><i class="notika-icon notika-file"></i> Lectures</a>
                  </li>
                  <li><a href="assignments/new_add.php"><i class="notika-icon notika-file"></i> Assignments</a>
                  </li>
                  <li><a href="books/new_add.php"><i class="notika-icon notika-file"></i> References</a>
                  </li>
                  <li><a href="papers/new_add.php"><i class="notika-icon notika-file"></i> Past papers</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Menu end -->

    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">

              <li><a data-toggle="tab" href="#log"><i class="notika-icon notika-menu"></i><?= $c['fname'].' '.' '.$c['lname']; ?></a>
              </li>
              <li><a href="mycourse.php"><i class="notika-icon notika-edit"></i> My Courses</a>
              </li>
              <li><a href="lecs/new_add.php"><i class="notika-icon notika-file"></i> Lectures</a>
              </li>
              <li><a href="assignments/new_add.php"><i class="notika-icon notika-file"></i> Assignments</a>
              </li>
              <li><a href="books/new_add.php"><i class="notika-icon notika-file"></i> References</a>
              </li>
              <li><a href="papers/new_add.php"><i class="notika-icon notika-file"></i> Past papers</a>
              </li>


            </ul>
            <div class="tab-content custom-menu-content">
              <div id="log" class="tab-pane in notika-tab-menu-bg animated flipInX">
                <ul class="notika-main-menu-dropdown">
                  <li><a href="profile.php">My Profile</a></li>
                  <li><a href="../logout.php">Sign Out</a></li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <?php
  $sql = "SELECT * FROM courses WHERE c_incharge = '$name'";
  $courses = $db->query($sql);
  $co1 = mysqli_num_rows($courses);

  $tot = "SELECT * FROM courses";
  $count = $db->query($tot);
  $co = mysqli_num_rows($count);

  $total = ($co1/$co) * 100;

  $l = "SELECT * FROM tbl_file";
  $le = $db->query($l);
  $co2 = mysqli_num_rows($le);

  $as = "SELECT * FROM tbl_asses";
  $ass = $db->query($as);
  $co3 = mysqli_num_rows($ass);

  ?>

  <!-- Start Email Statistic area-->
  <div class="notika-email-post-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
          <div class="email-statis-inner notika-shadow">
            <div class="email-ctn-round">
              <div class="text-center">
                <h2>Statistics</h2>
              </div>
              <div class="email-statis-wrap">
                <div class="email-round-nock">
                  <input type="text" class="knob" value="0" data-rel="<?= $total; ?>" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#982020" data-thickness=".10" data-readonly="true">
                </div>
                <div class="email-ctn-nock">
                  <p>My Courses</p>
                </div>
              </div>
              <div class="email-round-gp">
                <div class="email-round-pro">
                  <div class="email-signle-gp">
                    <input type="text" class="knob" value="0" data-rel="<?= $co2; ?>" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#BA5757" data-thickness=".10" data-readonly="true" disabled>
                  </div>
                  <div class="email-ctn-nock">
                    <p>Total Lectures</p>
                  </div>
                </div>
                <div class="email-round-pro">
                  <div class="email-signle-gp">
                    <input type="text" class="knob" value="0" data-rel="<?= $co3; ?>" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#BA5757" data-thickness=".10" data-readonly="true" disabled>
                  </div>
                  <div class="email-ctn-nock">
                    <p>Total Assignments</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
          <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
            <div class="recent-post-ctn">
              <div class="recent-post-title">
                <h2 class="text-center">My Courses</h2>
              </div>
            </div>
            <div class="recent-post-items">
              <?php while ($cs = mysqli_fetch_assoc($courses)) { ?>
                <div class="recent-post-signle rct-pt-mg-wp">
                  <div class="recent-post-flex">
                    <div class="recent-post-it-ctn">
                      <h2><?= $cs['c_code'].' - '.' '.$cs['c_name']; ?></h2>
                      <br>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php

        $b = "SELECT * FROM tbl_books";
        $bo = $db->query($b);
        $co4 = mysqli_num_rows($bo);

        $p = "SELECT * FROM tbl_papers";
        $pa = $db->query($p);
        $co5 = mysqli_num_rows($pa);

        ?>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
          <div class="email-statis-inner notika-shadow">
            <div class="email-ctn-round">
              <div class="text-center">
                <h2>Statistics</h2>
              </div>
              <div class="email-statis-wrap">
                <div class="email-round-nock">
                  <input type="text" class="knob" value="0" data-rel="<?= $total; ?>" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#982020" data-thickness=".10" data-readonly="true">
                </div>
                <div class="email-ctn-nock">
                  <p>My Courses</p>
                </div>
              </div>
              <div class="email-round-gp">
                <div class="email-round-pro">
                  <div class="email-signle-gp">
                    <input type="text" class="knob" value="0" data-rel="<?= $co4; ?>" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#BA5757" data-thickness=".10" data-readonly="true" disabled>
                  </div>
                  <div class="email-ctn-nock">
                    <p>Total References</p>
                  </div>
                </div>
                <div class="email-round-pro">
                  <div class="email-signle-gp">
                    <input type="text" class="knob" value="0" data-rel="<?= $co5; ?>" data-linecap="round" data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#BA5757" data-thickness=".10" data-readonly="true" disabled>
                  </div>
                  <div class="email-ctn-nock">
                    <p>Total Past Papers</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Email Statistic area-->


  <?php include 'include/footer.php'; ?>
  <!-- jquery
  ============================================ -->
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
  ============================================ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- wow JS
  ============================================ -->
  <script src="js/wow.min.js"></script>
  <!-- price-slider JS
  ============================================ -->
  <script src="js/jquery-price-slider.js"></script>
  <!-- owl.carousel JS
  ============================================ -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- scrollUp JS
  ============================================ -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- meanmenu JS
  ============================================ -->
  <script src="js/meanmenu/jquery.meanmenu.js"></script>
  <!-- counterup JS
  ============================================ -->
  <script src="js/counterup/jquery.counterup.min.js"></script>
  <script src="js/counterup/waypoints.min.js"></script>
  <script src="js/counterup/counterup-active.js"></script>
  <!-- mCustomScrollbar JS
  ============================================ -->
  <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sparkline JS
  ============================================ -->
  <script src="js/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
  ============================================ -->
  <script src="js/flot/jquery.flot.js"></script>
  <script src="js/flot/jquery.flot.resize.js"></script>
  <script src="js/flot/flot-active.js"></script>
  <!-- knob JS
  ============================================ -->
  <script src="js/knob/jquery.knob.js"></script>
  <script src="js/knob/jquery.appear.js"></script>
  <script src="js/knob/knob-active.js"></script>
  <!--  Chat JS
  ============================================ -->
  <script src="js/chat/jquery.chat.js"></script>
  <!--  todo JS
  ============================================ -->
  <script src="js/todo/jquery.todo.js"></script>
  <!--  wave JS
  ============================================ -->
  <script src="js/wave/waves.min.js"></script>
  <script src="js/wave/wave-active.js"></script>
  <!-- plugins JS
  ============================================ -->
  <script src="js/plugins.js"></script>
  <!-- Data Table JS
  ============================================ -->
  <script src="js/data-table/jquery.dataTables.min.js"></script>
  <script src="js/data-table/data-table-act.js"></script>
  <!-- main JS
  ============================================ -->
  <script src="js/main.js"></script>
</body>

</html>
