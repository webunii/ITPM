<!doctype html>
<html class="no-js" lang="">
<?php
session_start();
require_once("../../admin_status.php");
require_once "connection.php";

if (logged_in()==true) {
  $e = $_SESSION['email'];
}

$select_stmt= $db->prepare('SELECT * FROM user WHERE email =:e');	//sql select query
$select_stmt->bindParam(':e',$e);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
$incharge = $row['fname'];

if(isset($_REQUEST['btn_insert']))
{
  try
  {
    $name	= $_REQUEST['txt_name'];	//textbox name "txt_name"
    $course = $_REQUEST['txt_course'];
    //$status = 'ch';

    $image_file	= $_FILES["txt_file"]["name"];
    $type		= $_FILES["txt_file"]["type"];	//file name "txt_file"
    $size		= $_FILES["txt_file"]["size"];
    $temp		= $_FILES["txt_file"]["tmp_name"];

    $path = 'upload/'; //set upload folder path
    $path1 ="upload/".$image_file;
    $ext = pathinfo($image_file, PATHINFO_EXTENSION);
    $allowed = ['pdf'];
    if(empty($name)){
      $errorMsg="Please Enter Name";
    }
    else if(empty($course)){
      $errorMsg="Please Select a Course";
    }
    else if(empty($image_file)) {
      $errorMsg="Please Select Image";
    }
    //if (in_array($ext, $allowed))
    else if(in_array($ext, $allowed)) //check file extension
    {
      if(!file_exists($path1)) //check file not exist in your upload folder path
      {
        //move_uploaded_file($_FILES['txt_file']['tmp_name'],($path .$image_file));

        if($size < 5000000) //check file size 5MB
        {
          move_uploaded_file($_FILES['txt_file']['tmp_name'],($path .$image_file));
          //move upload file temperory directory to your upload folder
        }
        else
        {
          $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
        }
      }
      else
      {
        $errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
      }
    }
    else
    {
      $errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
    }

    if(!isset($errorMsg))
    {
      $insert_stmt=$db->prepare('INSERT INTO tbl_books(name,image,course) VALUES(:fname,:fimage,:fcourse)'); //sql insert query
      $insert_stmt->bindParam(':fname',$name);
      $insert_stmt->bindParam(':fimage',$image_file);
      $insert_stmt->bindParam(':fcourse',$course);
      //$insert_stmt->bindParam(':fstatus',$status);	  //status = course id shuold be here
      //bind all parameter

      if($insert_stmt->execute())
      {
        $insertMsg="File Upload Successfully........"; //execute query success message
        header("location:index.php"); // redirect to index.php page
      }
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Upload References</title>
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

  <?php include 'include/header_top.php';
  ?>

  <!-- Main Menu area start-->
  <div class="main-menu-area mg-tb-40">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li><a href="../index.php"><i class="notika-icon notika-house"></i> Home</a>
            </li>
            <li><a href="index.php"><i class="notika-icon notika-file"></i> View References</a>
            </li>
            <li><a href="../../logout.php"><i class="notika-icon notika-right-arrow"></i> Sign Out</a>
            </li>

          </ul>

        </div>

      </div>
    </div>
  </div>

  <!-- Data Table area Start-->
  <div class="data-table-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="data-table-list">
            <br>
            <div class="basic-tb-hd">
              <h2 class="text-center">Upload References</h2>
            </div>
            <br>
            <div class="wrapper">

              <div class="container">

                <div class="col-lg-12">

                  <?php
                  if(isset($errorMsg))
                  {
                    ?>
                    <div class="alert alert-danger">
                      <strong>WRONG ! <?php echo $errorMsg; ?></strong>
                    </div>
                    <?php
                  }
                  if(isset($insertMsg)){
                    ?>
                    <div class="alert alert-success">
                      <strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
                    </div>
                    <?php
                  }
                  ?>

                  <form method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Course</label>
                      <div class="col-sm-6">
                        <select name="txt_course" class="form-control">
                          <option></option>
                          <?php
                          $select_stmt=$db->prepare("SELECT * FROM courses WHERE c_incharge = '$incharge'");
                          //$select_stmt->bindParam(':e',$e);
                          $select_stmt->execute();
                          while ($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option><?php echo $row['c_name']; ?></option>
                          <?php } ?>
                        </select></div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Ref Name</label>
                        <div class="col-sm-6">
                          <input type="text" name="txt_name" class="form-control" placeholder="enter name" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Ref File</label>
                        <div class="col-sm-6">
                          <input type="file" name="txt_file" class="form-control" />
                        </div>
                      </div>

                      <br>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                          <button type="submit"  name="btn_insert" class="btn btn-info btn-md">Insert</button>
                          &nbsp;<a href="index.php" class="btn btn-default">Cancel</a>
                        </div>
                      </div>

                    </form>
                    <br>
                  </div>

                </div>
                <br>
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
