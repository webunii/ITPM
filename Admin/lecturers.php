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
  <!-- Start Header Top Area -->
  <?php include 'include/header_top.php';
   ?>
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
                      <li><a href="Notices/index.php"><i class="notika-icon notika-paperclip"></i> Add Notices</a>
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
                  <li><a href="Notices/index.php"><i class="notika-icon notika-paperclip"></i> Add Notices</a>
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

         <!-- Breadcomb area Start-->
         <div class="breadcomb-area">
           <div class="container">
             <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="breadcomb-list">
                   <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="breadcomb-wp">
                          <div class="breadcomb-ctn">
                            <?php
                            if(isset($_POST['delete'])){
                                // sql to delete a record
                                $delete_id = $_POST['delete_id'];
                                $sql = "DELETE FROM user WHERE id='$delete_id' ";
                                if ($db->query($sql) === TRUE) {
                                  echo '<div class="alert alert-success"><strong>Success!</strong> Lecturer Removed.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                                } else {
                                  echo '<div class="alert alert-danger"><strong>Error!</strong> Try to Lecturer again.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                                }
                            }
                             ?>
                          </div>
                        </div>
                      </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                       <div class="breadcomb-report">
                          <a href="add.php">
                          <button class="btn btn-danger notika-btn-danger"><span class="glyphicon glyphicon-plus"></span> Add a Lecturer</button>
                          </a>
                        </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <!-- Breadcomb area End-->

  <?php
    $sql = "SELECT * FROM user where role = '1'";
    $lec = $db->query($sql);
?>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2 class="text-center">Lecturers List</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                  <tr>
                                      <th>Lecturer Name</th>
                                      <th>Lecturer Email</th>
                                      <th>Contact Number</th>
                                      <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php while ($l = mysqli_fetch_assoc($lec)) {
                                    $id = $l['id'];
                                    $fname = $l['fname'];
                                    $lname = $l['lname'];
                                    ?>
                                      <tr>
                                      <td><?= $l['fname'].' '.' '.$l['lname']; ?></td>
                                      <td><?= $l['email']; ?></td>
                                      <td><?= $l['phone']; ?></td>
                                      <td>
                                        <a href="#delete<?php echo $id;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-danger btn-sm'>Delete</button>
                                          </a>
                                        </td>
                                        <!-- Start Delete Lecturer Modal -->
                                        <?php include 'include/delete_lec.php'; ?>
                                        <!-- End Delete Lecturer Modal -->
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

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
