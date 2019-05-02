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
    <title>Courses</title>
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
    <!-- font awesome CSS
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
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
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

<script language="JavaScript" type="text/javascript" src="course.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php
        $not = "select * from notification ORDER BY id DESC LIMIT 5";
        $result = $db->query($not);
        $n = 'select * from notification where status = 0';
        $result1 = $db->query($n);
        $num = mysqli_num_rows($result1);
         ?>
        <!-- Start Header Top Area -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="index.php"><img src="img/logo/logo.png" alt="" /></a>
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
                                         <li><a href="profile.php">My Profile</a></li>
                                         <li><a href="logout.php">Sign Out</a></li>
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
                             <li><a href="Notices/index.php"><i class="notika-icon notika-paperclip"></i> Add Notices</a>
                             </li>
                         </ul>
                         <div class="tab-content custom-menu-content">
                           <div id="log" class="tab-pane in notika-tab-menu-bg animated flipInX">
                             <ul class="notika-main-menu-dropdown">
                               <li><a href="profile.php">My Profile</a></li>
                               <li><a href="logout.php">Sign Out</a></li>
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
                    //Add Item
                    if(isset($_POST['add_course'])){
                        $c_code = $_POST['c_code'];
                        $c_name = $_POST['c_name'];
                        $c_lec = $_POST['c_lec'];
                        $c_credits = $_POST['c_credits'];

                        $check = "SELECT * FROM courses WHERE c_code = '$c_code'";
                        $rs = mysqli_query($db,$check);
                        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                        if($data[0] > 1) {
                          echo '<div class="alert alert-warning"><strong>Warning!</strong> Course Already in Exists.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                        }else{
                          $csql = "INSERT INTO courses (c_code,c_name,c_incharge,c_credits,ad_date)VALUES ('$c_code','$c_name','$c_lec','$c_credits', CURRENT_TIMESTAMP)";
                          $notification = "INSERT INTO notification (subject, message) VALUES ('$c_name', '$c_code')";
                          $results = mysqli_query($db, $notification);

                          if ($db->query($csql) === TRUE) {
                            echo '<div class="alert alert-success"><strong>Success!</strong> A New Course Added.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                          }
                          else
                          {
                            echo '<div class="alert alert-danger"><strong>Error!</strong> Try to insert again.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                          }
                        }
                    }

                    if(isset($_POST['delete'])){
                        // sql to delete a record
                        $delete_id = $_POST['delete_id'];
                        $sql = "DELETE FROM courses WHERE id='$delete_id' ";
                        if ($db->query($sql) === TRUE) {
                          echo '<div class="alert alert-success"><strong>Success!</strong> Course Deleted.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                        } else {
                          echo '<div class="alert alert-danger"><strong>Error!</strong> Try to delete again.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                        }
                    }

                    //Update Courses
                    if(isset($_POST['edit'])){
                        $edit_course_id = $_POST['edit_course_id'];
                        $ec_code = $_POST['ec_code'];
                        $ec_name = $_POST['ec_name'];
                        $ec_lec = $_POST['ec_lec'];
                        $ec_credits = $_POST['ec_credits'];
                        $sql = "UPDATE courses SET
                            c_code='$ec_code',
                            c_name='$ec_name',
                            c_incharge='$ec_lec',
                            c_credits='$ec_credits',
                            ad_date = CURRENT_TIMESTAMP
                            WHERE id='$edit_course_id' ";
                        if ($db->query($sql) === TRUE) {
                            echo '<script>window.location.href="course.php"</script>';
                        } else {
                            echo "Error updating record: " . $db->error;
                        }
                    }

                     ?>
                  </div>
                </div>
              </div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                  <a href="#add" data-toggle="modal">
                  <button class="btn btn-danger notika-btn-danger"><span class="glyphicon glyphicon-plus"></span> Add a new Course</button>
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
    $sql = "SELECT * FROM courses";
    $courses = $db->query($sql);
?>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2 class="text-center">Courses</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                  <tr>
                                      <th>Course Code</th>
                                      <th>Course Name</th>
                                      <th>Lecture Incharge</th>
                                      <th>Course Credits</th>
                                      <th>Course Added/Updated Date</th>
                                      <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php while ($c = mysqli_fetch_assoc($courses)) {
                                    $id = $c['id'];
                                    $name = $c['c_name'];
                                    ?>
                                      <tr>
                                      <td><?= $c['c_code']; ?></td>
                                      <td><?= $c['c_name']; ?></td>
                                      <td><?= $c['c_incharge']; ?></td>
                                      <td><?= $c['c_credits']; ?></td>
                                      <td><?= $c['ad_date']; ?></td>
                                      <td>
                                        <a href="#edit<?php echo $id;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-warning btn-sm'>
                                            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                                        </a>
                                        <a href="#delete<?php echo $id;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-danger btn-sm'>
                                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                                          </a>
                                        </td>
                                        <!-- Start Delete Course Modal -->
                                        <?php include 'include/delete_course.php'; ?>
                                        <!-- End Delete Course Modal -->

                                        <!-- Start Update Course Modal -->
                                        <?php include 'include/edit_course.php'; ?>
                                        <!-- End Update Course Modal -->
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

    <!-- Start Add Course Modal -->
    <?php include 'include/add_course.php'; ?>
    <!-- End Add Course Modal -->

    <?php include 'include/footer.php'; ?>

    <script type="text/javascript">
    function checkvalidate() {
    var ec_code = document.forms.myForm.ec_code.value;
    var ec_name = document.forms.myForm.ec_name.value;
    var ec_lec = document.forms.myForm.ec_lec.value;

    if (Alphabetic(ec_name))
        if (AlphaVal(ec_lec))
            if (codeValidation(ec_code))
                return true;
            else
            return false;
        else
        return false;
    else
       return false;
}

function empty(elemValue, field) {
    if (elemValue === "" || elemValue === null){
        alert("You cannot have " + field + " field empty");
        return true;
    }
    else
        return false;
}

function Alphabetic(elemValue) {

    //Course Name must be consist of Alphabetical characters only
    if (!empty(elemValue, "Course Name")){
        var exp = /^[a-zA-Z]+$/;
        if (elemValue.match(exp)){
            return true;
        }
        else {
            alert("You Should Enter a Course Name");
            return false;
        }
    }
    else
        return false;
}

function AlphaVal(elemValue) {

    //Last Name must be consist of Alphabetical characters only
    if (!empty(elemValue, "Lecture Incharge")){
        var exp = /^[a-zA-Z]+$/;
        if (elemValue.match(exp)){
            return true;
        }
        else {
            alert("Enter only characters for Lecture Incharge");
            return false;
        }
    }
    else
        return false;
}

function codeValidation(elemValue) {

    if (!empty(elemValue, "Course Code")){
        var exp = /^[iItT]{2}[0-9]{4}+$/;
        if (elemValue.match(exp)){
            return true;
        }
        else {
            alert("Invalid Course Code");
            return false;
        }
    }
    else
        return false;
}
    </script>


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
