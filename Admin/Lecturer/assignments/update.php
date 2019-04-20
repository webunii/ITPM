<!doctype html>
<html class="no-js" lang="">
<?php

require_once "connection.php";

if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt = $db->prepare('SELECT * FROM tbl_asses WHERE id =:id'); //sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}

}

if(isset($_REQUEST['btn_update']))
{
	try
	{
		$name	=$_REQUEST['txt_name'];	//textbox name "txt_name"

		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];

		$path1="upload/".$image_file; //set upload folder path
		$path = 'upload/'; //set upload folder path
		 $ext = pathinfo($image_file, PATHINFO_EXTENSION);
		 $allowed = ['docx'];

		$directory="upload/"; //set upload folder path for update time previous file remove and new file upload for next use

		$directory="upload/"; //set upload folder path for update time previous file remove and new file upload for next use

 if($image_file)
 {
 	$upload_dir = 'upload/'; // upload directory
	$imgExt = strtolower(pathinfo($image_file,PATHINFO_EXTENSION)); // get image extension
  $valid_extensions = array('docx'); // valid extensions

	 if(in_array($imgExt, $valid_extensions))
    {
			if(!file_exists($path1)) //check file not exist in your upload folder path
			{
					if($size < 5000000) //check file size 5MB
					{
		 				unlink($directory.$row['file']); //unlink function remove previous file
		 				move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
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
	 $errorMsg="Upload DOCX File Formate.....CHECK FILE EXTENSION"; //error message file extension
	}
}
 else
 {
	$image_file=$row['file']; //if you not select new image than previous image sam it is it.
 }

		if(!isset($errorMsg))
		{
			$update_stmt=$db->prepare('UPDATE tbl_asses SET name=:name_up, file=:file_up WHERE id=:id'); //sql update query
			$update_stmt->bindParam(':name_up',$name);
			$update_stmt->bindParam(':file_up',$image_file);	//bind all parameter
			$update_stmt->bindParam(':id',$id);

			if($update_stmt->execute())
			{
				$updateMsg="File Update Successfully.......";	//file update success message
				header("location:index.php");	//refresh 3 second and redirect to index.php page
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
    <title>Update Lectures</title>
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
                          <h2 class="text-center">Edit Assignments</h2>
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
                      		if(isset($updateMsg)){
                      		?>
                      			<div class="alert alert-success">
                      				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
                      			</div>
                              <?php
                      		}
                      		?>

                      			<form method="post" class="form-horizontal" enctype="multipart/form-data">

                      				<div class="form-group">
                      				<label class="col-sm-3 control-label">Name</label>
                      				<div class="col-sm-6">
                      				<input type="text" name="txt_name" class="form-control" value="<?php echo $name; ?>" required/>
                      				</div>
                      				</div>


                      				<div class="form-group">
                      				<label class="col-sm-3 control-label">File</label>
                      				<div class="col-sm-6">
                      				<input type="file" name="txt_file" class="form-control" value="<?php echo $file; ?>"/>
                      				</div>
                      				</div>

                              <div class="form-group">
                      				<label class="col-sm-3 control-label">Previous File</label>
                      				<div class="col-sm-6">
                      				<p><?php echo $file; ?></p>
                      				</div>
                      				</div>

                      				<div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                <button type="submit"  name="btn_update" class="btn btn-success btn-md">Update</button>
                                &nbsp;<a href="index.php" class="btn btn-danger">Cancel</a>
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
