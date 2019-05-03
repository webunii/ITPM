<!doctype html>
<html class="no-js" lang="">
<?php   //including the database connection file
include("config.php");
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Set Timer</title>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <?php include 'include/header_top.php';
  ?>

  <div class="main-menu-area mg-tb-40">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li><a href="../../logout.php"><i class="notika-icon notika-right-arrow"></i> Sign Out</a>
            </li>
          </ul>

        </div>

      </div>
    </div>
  </div>

  <?php
  //fetching data in descending order (lastest entry first)
  $result = mysqli_query($mysqli, "SELECT * FROM timer ORDER BY id DESC"); // using mysqli_query instead
  ?>
  <?php
  while($res = mysqli_fetch_array($result)) {
    $date = $res['date'];
  }
  ?>
  <?php $rid = $_GET['id']; ?>

  <?php
  //fetching data in descending order (lastest entry first)
  $result = mysqli_query($mysqli, "SELECT * FROM timer ORDER BY id DESC"); // using mysqli_query instead
  $sql = "SELECT * FROM tbl_asses WHERE id = '$rid'";
  $asses = $mysqli->query($sql);
  $c = mysqli_fetch_assoc($asses);

  ?>
  <?php
  while($res = mysqli_fetch_array($result)) {
    $date = $res['date'];
    $h = $res['h'];
    $m = $res['m'];
    $s = $res['s'];
  }
  ?>
  <script>
  // Set the date we're counting down to
  // 1. JavaScript
  // var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
  // 2. PHP
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
  }
}, 1000);
</script>
<script src="js/jquery.timeTo.js"></script>
<script>
/***
* Set timer countdown in seconds with callback
*/

var date = getRelativeDate(20);

document.getElementById('date-str').innerHTML = date.toString();

/**
* Set timer countdown to specyfied date
*/
$('#countdown-2').timeTo(date);

function getRelativeDate(days, hours, minutes){
  var date = new Date(Date.now() + 60000 /* milisec */ * 60 /* minutes */ * 24 /* hours */ * days /* days */);

  date.setHours(hours || 0);
  date.setMinutes(minutes || 0);
  date.setSeconds(0);

  return date;
}
</script>

<?php
// including the database connection file
//


if(isset($_POST['insert']))
{


  $date= mysqli_real_escape_string($mysqli, $_POST['date']);
  $h= mysqli_real_escape_string($mysqli, $_POST['h']);
  $m= mysqli_real_escape_string($mysqli, $_POST['m']);
  $s= mysqli_real_escape_string($mysqli, $_POST['s']);
  $aid= mysqli_real_escape_string($mysqli, $_POST['aid']);
  $course= mysqli_real_escape_string($mysqli, $_POST['course']);


  // checking empty fields

  //updating the table
  $result = mysqli_query($mysqli, "INSERT INTO timer(date, h, m, s, name, course) VALUES('$date', '$h', '$m', '$s', '$aid', '$course')");
  // $result = mysqli_query($mysqli, "UPDATE timer SET date='$date' WHERE id=1");
  // $result = mysqli_query($mysqli, "UPDATE timer SET h='$h' WHERE id=1");
  // $result = mysqli_query($mysqli, "UPDATE timer SET m='$m' WHERE id=1");
  // $result = mysqli_query($mysqli, "UPDATE timer SET s='$s' WHERE id=1");
//    $time = mysqli_query($mysqli, "SELECT * FROM timer WHERE id='$rid'");
//    $time2 = mysqli_fetch_assoc($time);


//    email
    require 'PHPMailer/PHPMailerAutoload.php';// require this
//require 'PHPMailer/class.phpmailer.php';
    $mail = new PHPMailer;//create an object

    $mail->isSMTP();
//    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;


    $mail->Username = 'itpm1920@gmail.com';
    $mail->Password = 'Admin@2019';

    $mail->setFrom('itpm1920@gmail.com', "Webuni");
    $mail->addAddress("dinukakulatunga@gmail.com");
    $mail->addAddress("majchemachandra@gmail.com");
    $mail->addReplyTo("kushib96@gmail.com");

    $mail->IsHTML(true);
    $mail->Subject  = 'Webuni';
    $mail->Body     = 'Kindly reminder about the new assignment.....'. "<br><br>".'Assignment Name : '.$c['name']. "<br>".'Course Name : '.$c['course']. "<br><br>".'Please vist Webuni for more details : http://localhost:8030/ITPM/';

    if(!$mail->send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
        echo "<script>swal('Timer Set','','success');</script>";
//        header("location:index.php");
    }

//    end of email
}

?>
<?php
//getting id from url


//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM timer WHERE id='$rid'");

while($res = mysqli_fetch_array($result))

{


  $date = $res['date'];
  $h = $res['h'];
  $m = $res['m'];
  $s = $res['s'];
}
?>
<h2 class="text-center"><?= $c['name']; ?> - <?= $c['course']; ?></h2>

<br>
<!-- Data Table area Start-->
<div class="data-table-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="data-table-list">
          <div class="panel-heading bg-danger">
            <h4 class="text-center">Manage Assesments Timer</h4>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row w3-res-tb">
              <?php if(isset($sucess))
              {
                echo $sucess;
              }
              ?>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">

                    <div class="panel-body">
                      <div class="position-center text-center">
                        <form class="form-inline" role="form"name="form1" method="POST" action="time.php?id=<?= $rid; ?>">
                          <div class="form-group"style="width:40%;">

                            <td >Date:- <h1> <?php echo $date  ?></h1>  </td>
                          </div>
                          <div class="form-group">

                            <td>Hrs: <h1> <?php echo $h." : "  ?></h1>  </td>
                          </div>
                          <div class="form-group">

                            <td>Min: <h1> <?php echo $m ." : " ?></h1>  </td>
                          </div>
                          <div class="form-group">
                            <td>Sec: <h1> <?php echo $s  ?></h1>  </td>
                          </div>
                          <div class="checkbox">

                          </div>

                        </form>
                      </div>
                    </div>
                  </section>

                </div>
              </div>
              <div class="col-sm-5 m-b-xs">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <section class="panel">
                  <div class="panel-heading bg-danger">
                    <h4 class="text-center">Counter Timer</h4>
                  </div>
                  <div class="panel-body">
                    <div class="position-center  text-center">
                      <form class="form-inline" role="form"name="form1" method="POST" action="time.php?id=<?= $rid; ?>">
                        <div class="form-group">

                          Date* <input type="date" name="date"class="form-control"  value="<?php echo $date;?>"required >
                        </div>
                        &nbsp;
                        <div class="form-group">

                          H* <input type="number" class="form-control" name="h" id="exampleInputPassword2" value="<?php echo $h;?>"placeholder="h"style="width:78px;" required>
                        </div>
                        &nbsp;
                        <div class="form-group">

                          M* <input type="number" class="form-control"name="m"  id="exampleInputPassword2" value="<?php echo $m;?>"placeholder="m"style="width:78px;" required>
                        </div>
                        &nbsp;
                        <div class="form-group">

                          S* <input type="number" class="form-control"name="s"  id="exampleInputPassword2" value="<?php echo $s;?>"placeholder="s"style="width:78px;" required>
                        </div>
                        &nbsp;
                        <input type="hidden" name="aid" value="<?php echo $c['name']; ?>">
                        <input type="hidden" name="course" value="<?php echo $c['course']; ?>">
                        <div class="checkbox">

                        </div>
                        <button type="submit" class="btn btn-danger" name="insert">Set Assesments time</button>
                      </form>
                    </div>
                  </div>
                </section>
              </div>
            </div>
            <!-- /.panel-body -->
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
