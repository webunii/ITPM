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
    <title>Profile</title>
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
  <script>
  function FidError()
  {
    var fname = document.forms["Note"]["fname"];
    var lname = document.forms["Note"]["lname"];
    var email = document.forms["Note"]["email"];
    var contact = document.forms["Note"]["contact"];
    var letter = /^[A-Za-z]+$/;
    var num = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    var mail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


    if (fname.value == "")
    {
      window.alert("Please enter first name.");
      return false;
    }

    if (lname.value == "")
    {
      window.alert("Please enter last name.");
      return false;
    }

    if (email.value == "")
    {
      window.alert("Please enter Email.");
      return false;
    }

    if (contact.value == "")
    {
      window.alert("Please enter Contact number.");
      return false;
    }
    //letter validation
    if(!(fname.value.match(letter)) || !(lname.value.match(letter))){
      alert('Please enter letters for name');
      return false;
    }

    //Integers validation for numbers
    if(contact.value.match(letter)){
      alert('Please enter numbers for phone number');
      return false;
    }

    //number validation
    if(!(contact.value.match(num))){
      alert('Please enter a valid number!');
      return false;
    }

    //email validation
    if(!(email.value.match(mail))){
      alert("Enter a valid Email!");
      return false;
    }





    return true;
    Note.submit();
  }</script>

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
                                    <?php while ($c = mysqli_fetch_assoc($result)) { ?>
                                    <li><a data-toggle="collapse" data-target="#log" href="#"><?= $c['fname']; ?></a>
                                        <ul class="collapse dropdown-header-top">
                                          <li><a href="profile.php">My Profile</a></li>
                                          <li><a href="logout.php">Sign Out</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="index.php"><i class="notika-icon notika-house"></i> Home</a>
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

          <?php
          $sql="select * from user where email = '$e'";
          $record=mysqli_query($db,$sql);
          $check=mysqli_fetch_array($record);
          ?>

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2 class="text-center">Admin Profile</h2>
                    </div>
                      <form method="post" class="form-horizontal" role="form" name="Note" onsubmit="return FidError()" id="Note" action="update.php">

                        <div class="form-group">
                          <h1 class="text-center"><img src="images/user.png"></h1>
                        </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="fname">First Name: </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="fname" name="fname" value="<?= $check['fname']?>" autocomplete="off">
                                <span class="c_code-validation validation-error"></span></div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="lname">Last Name: </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $check['lname']?>" autocomplete="off">
                                <span class="c_code-validation validation-error"></span></div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="email">Email:</label>
                                  <div class="col-sm-5">
                                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $check['email']?>" autocomplete="off"></div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="contact">Contact Number:</label>
                                  <div class="col-sm-5">
                                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $check['phone']?>" autocomplete="off"></div>
                              </div>

                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-9 m-t-15">
                                <input type="hidden" name="id" value="<?php echo $check['id']?>">
                              <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Update</button>
                              <button class="btn btn-default"><a href="profile.php"><span class="glyphicon glyphicon-remove"></span> Cancel</a></button>
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
