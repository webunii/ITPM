<!doctype html>
<html class="no-js" lang="">
<?php
include('db/dbcon.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add a Lecturer</title>
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

         <!-- Mobile Menu start -->
         <div class="mobile-menu-area">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="mobile-menu">
                             <nav id="dropdown">
                                 <ul class="mobile-menu-nav">
                                   <li><a href="lecturers.php"><i class="notika-icon notika-left-arrow"></i> Back</a>
                                   </li>
                                   <li><a href="profile.php"><i class="notika-icon notika-form"></i> My Profile</a>
                                   </li>
                                   <li><a href="logout.php"><i class="notika-icon notika-form"></i> Sign Out</a>
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
                             <li><a href="lecturers.php"><i class="notika-icon notika-left-arrow"></i> Back</a>
                             </li>

                             <li><a href="profile.php"><i class="notika-icon notika-support"></i> My Profile</a>
                             </li>
                             <li><a href="logout.php"><i class="notika-icon notika-right-arrow"></i> Sign Out</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Main Menu area End-->
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
                    if(isset($_POST['add_lec'])){
                        $lec_fname = $_POST['lec_fname'];
                        $lec_lname = $_POST['lec_lname'];
                        $lec_email = $_POST['lec_email'];
                        $lec_phone = $_POST['lec_phone'];
                        $lec_pw = $_POST['lec_pw'];
                        $password = md5($lec_pw);

                        $select = "SELECT * FROM user WHERE email = '$lec_email'";
                        $rs = mysqli_query($db,$select);
                        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                        if($data[0] > 1) {
                          echo '<div class="alert alert-warning"><strong>Warning!</strong> Lecturer Already in Exists.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                        }else{
                          $lsql = "INSERT INTO user (fname,lname,email,phone,password) VALUES ('$lec_fname','$lec_lname','$lec_email','$lec_phone','$password')";
                          if ($db->query($lsql) === TRUE) {
                            echo '<div class="alert alert-success"><strong>Success!</strong> A New Lecturer Added.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';

                          }
                          else
                          {
                            echo '<div class="alert alert-danger"><strong>Error!</strong> Try to insert again.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
                          }
                        }
                    }

                     ?>
                  </div>
                </div>
              </div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2 class="text-center">Add a Lecturer</h2>
                        </div>
                          <form method="post" class="form-horizontal" role="form" name="myForm" onsubmit="return lecvalidate()" >
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="lec_fname">Lecturer First Name: </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="lec_fname" name="lec_fname" placeholder="eg. abc" autocomplete="off">
                                    <span class="c_code-validation validation-error"></span></div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="lec_lname">Lecturer Last Name: </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="lec_lname" name="lec_lname" placeholder="eg. perera" autocomplete="off">
                                    <span class="c_code-validation validation-error"></span></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-2" for="lec_email">Lecturer Email:</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="lec_email" name="lec_email" placeholder="eg. abc@gmail.com" autocomplete="off"></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-2" for="lec_phone">Lecturer Contact Number:</label>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="lec_phone" name="lec_phone" placeholder="eg. 0112345678/0774569878" autocomplete="off"></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-2" for="lec_pw">Password:</label>
                                      <div class="col-sm-5">
                                          <input type="password" class="form-control" id="lec_pw" name="lec_pw" placeholder="eg. X8df!90EO" autocomplete="off"></div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-sm-2" for="lec_cpw">Confirm Password:</label>
                                      <div class="col-sm-5">
                                          <input type="password" class="form-control" id="lec_cpw" name="lec_cpw" placeholder="eg. X8df!90EO" autocomplete="off"></div>
                                  </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-9 m-t-15">
                                  <button type="submit" class="btn btn-danger" name="add_lec" id="add_lec"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                  <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
                                </div>
                              </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

    <?php include 'include/footer.php'; ?>

    <script type="text/javascript">
    function lecvalidate() {
    var lec_fname = document.forms.myForm.lec_fname.value;
    var lec_lname = document.forms.myForm.lec_lname.value;
    var lec_email = document.forms.myForm.lec_email.value;
    var lec_phone = document.forms.myForm.lec_phone.value;
    var lec_pw = document.forms.myForm.lec_pw.value;
    var lec_cpw = document.forms.myForm.lec_cpw.value;

if (Alphabetic(lec_fname))
    if (AlphaVal(lec_lname))
            if (emailValidation(lec_email))
                if (numeric(lec_phone))
                    if (checkPassword(lec_pw, lec_cpw))
                        return true;
                    else
                        return false;
                else
                    return false;
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

//Lecturer First Name must be consist of Alphabetical characters only
if (!empty(elemValue, "Lecturer First Name")){
    var exp = /^[a-zA-Z]+$/;
    if (elemValue.match(exp)){
        return true;
    }
    else {
        alert("Enter only characters for Lecturer First NameFirst");
        return false;
    }
}
else
    return false;
}

function AlphaVal(elemValue) {

//Lecturer Last Name must be consist of Alphabetical characters only
if (!empty(elemValue, "Lecturer Last Name")){
    var exp = /^[a-zA-Z]+$/;
    if (elemValue.match(exp)){
        return true;
    }
    else {
        alert("Enter only characters for Lecturer Last Name");
        return false;
    }
}
else
    return false;
}

function emailValidation(elemValue) {
    if (!empty(elemValue, "Lecturer Email")){
        var atop = elemValue.indexOf("@");
        var dotop = elemValue.indexOf(".");

        if (atop < 1 || dotop + 2 >= elemValue.length || atop + 2 > dotop){
            alert("Enter a valid Lecturer Email");
            return false;
        }
        else
            return true;
    }
    else
        return false;
}

function numeric(elemValue) {
    if (!empty(elemValue, "Lecturer Contact Number")){
        var exp = /^[0-9]{10}$/;
        //Contact number field must consist of numbers only
        if (elemValue.match(exp)){
            return true;
        }
        else {
            alert("Enter valid Lecturer Contact Number");
            return false;
        }
    }
    else
        return false;
}

function checkPassword(elemValue, elemValue1) {
    var exp = /^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9@#$^+=])(.{8,})$/;

    if (!empty(elemValue, "Password") && !empty(elemValue1, "Confirm Password")) {
        if (elemValue.match(exp)) {
            if (elemValue === elemValue1) {

                return true;
            }
            else {

                alert("Password doesn't match.");
                return false;
            }

        }
        else {

            alert("There should be more than 8 characters.");
            return false;

        }
    }
    else
    {
        return false;
    }
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
