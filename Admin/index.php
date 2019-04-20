<!doctype html>
<html class="no-js" lang="">
<?php
session_start();
require_once("admin_status.php");

include('db/dbcon.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
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
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
        $not = "select * from comments ORDER BY id DESC LIMIT 5";
        $result = $db->query($not);
        $n = 'select * from comments where comment_status = 0';
        $result1 = $db->query($n);
        $num = mysqli_num_rows($result1);
         ?>
        <!-- Start Header Top Area -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="header-top-menu">
                            <ul class="nav navbar-nav notika-top-nav">
                              <li class="nav-item dropdown">
                                  <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                  <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                      <div class="search-input">
                                          <i class="notika-icon notika-left-arrow"></i>
                                          <input type="text" />
                                      </div>
                                  </div>
                              </li>
                              <li class="nav-item "><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                              <span><i class="notika-icon notika-alarm"></i></span></a>
                                  <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                      <div class="hd-mg-tt">
                                          <h2>Notification</h2>
                                      </div>
                                      <?php
                                      if (isset($_GET['notf'])) {
                                        $n_id = $_GET['notf'];
                                        $up = "UPDATE comments SET comment_status = '1' WHERE id = '$n_id'";
                                        $db->query($up);
                                      }

                                       ?>
                                       <div class="hd-message-info">
                                             <?php while ($notifi = mysqli_fetch_assoc($result)) { ?>
                                               <div class="hd-message-sn">
                                                   <div class="hd-mg-ctn">
                                                     <?php if($notifi['comment_status'] == 0){
                                                       $id = $notifi['id'];
                                                        ?>
                                                         <h3 class="alert-danger"><a style="font-size:14px;" href="?notf=<?php echo $id; ?>"><?= $notifi['comment_subject'] . ' <br> ' .
                                                         $notifi['comment_text']; ?></a></h3>
                                                     <?php } else { ?>
                                                       <h3><?= $notifi['comment_subject'] . ' <br> ' .
                                                       $notifi['comment_text']; ?></h3>
                                                   <?php } ?>
                                                   </div>
                                               </div>
                                                   <?php } ?>
                                       </div>
                              </li>
                                <li class="nav-item "><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                  <div class="ntd-ctn"><span></span><?= $num; ?></div></a>
                                </li>
                              <li class="nav-item "><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"></a>
                                  <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                              </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area -->

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
                           <?php while ($c = mysqli_fetch_assoc($result)) { ?>
                           <li><a data-toggle="collapse" data-target="#log" href="#"><?= $c['fname']; ?></a>
                               <ul class="collapse dropdown-header-top">
                                 <li><a href="#">My Profile</a></li>
                                 <li><a href="../logout.php">Sign Out</a></li>
                               </ul>
                           </li>
                           <li><a href="index.php"><i class="notika-icon notika-house"></i> Home</a>
                           </li>
                           <li><a href="students.php"><i class="notika-icon notika-edit"></i> Students' Details</a>
                           </li>
                           <li><a href="lecturers.php"><i class="notika-icon notika-edit"></i> Lecturers' Details</a>
                           </li>
                           <li><a href="course.php"><i class="notika-icon notika-paperclip"></i> Courses Management</a>
                           </li>
                           <li><a href="#"><i class="notika-icon notika-windown"></i> Courses Count</a>
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

                     <li><a data-toggle="tab" href="#log"><i class="notika-icon notika-menu"></i> <?= $c['fname']; ?></a>
                     </li>
                     <li><a href="index.php"><i class="notika-icon notika-house"></i> Home</a>
                     </li>
                     <li><a href="students.php"><i class="notika-icon notika-edit"></i> Students' Details</a>
                     </li>
                     <li><a href="lecturers.php"><i class="notika-icon notika-edit"></i> Lecturers' Details</a>
                     </li>
                     <li><a href="course.php"><i class="notika-icon notika-paperclip"></i> Courses</a>
                     </li>
                     <li><a href="#"><i class="notika-icon notika-eye"></i> Courses Count</a>
                     </li>
                 </ul>
                 <div class="tab-content custom-menu-content">
                   <div id="log" class="tab-pane in notika-tab-menu-bg animated flipInX">
                     <ul class="notika-main-menu-dropdown">
                       <li><a href="#">My Profile</a></li>
                       <li><a href="../logout.php">Sign Out</a></li>
                     </ul>
                   </div>
             </div>
             </div>
       <?php } ?>
         </div>
     </div>
 </div>


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
