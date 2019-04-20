<!doctype html>
<html class="no-js" lang="">
<?php
require_once "connection.php";

if(isset($_REQUEST['delete_id']))
{
  // select image from db to delete
  $id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable

  $select_stmt= $db->prepare('SELECT * FROM tbl_asses WHERE id =:id');	//sql select query
  $select_stmt->bindParam(':id',$id);
  $select_stmt->execute();
  $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
  unlink("upload/".$row['file']); //unlink function permanently remove your file

  //delete an orignal record from db
  $delete_stmt = $db->prepare('DELETE FROM tbl_asses WHERE id =:id');
  $delete_stmt->bindParam(':id',$id);
  $delete_stmt->execute();

  header("Location:index.php");
}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Assignments</title>
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

  <div class="main-menu-area mg-tb-40">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
            <li><a href="../index.php"><i class="notika-icon notika-house"></i> Home</a>
            </li>
            <li><a href="new_add.php"><i class="notika-icon notika-file"></i> Upload Assignments</a>
            </li>
            <li><a href="../../logout.php"><i class="notika-icon notika-right-arrow"></i> Sign Out</a>
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

      </div>
    </div>
  </div>


  <!-- Data Table area Start-->
  <div class="data-table-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="data-table-list">
            <div class="panel-heading">
              <h3 class="text-center">Assignments</h3>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>File</th>
                      <th>Course Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $select_stmt=$db->prepare("SELECT * FROM tbl_asses");	//sql select query
                    $select_stmt->execute();
                    while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                      $rid = $row['id'];
                      ?>
                      <tr>
                        <td><a href="time.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                        <td><a href="upload/<?php echo $row['file']; ?>"><?php echo $row['file']; ?></a></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><a href="update.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
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
