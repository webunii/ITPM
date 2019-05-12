<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once("user_status.php");

include('db/dbcon.php');

if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php
    header('Location: logout2.php'); //change yoursite.com to the name of you site!!
} else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}

?>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Lectures | Assignments</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- comments stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/comments.css" />

    <!--Button Style-->
    <link type="text/css" rel="stylesheet" href="css/ButtonStyleInMeterial.css"/>

</head>

<body>
<!-- Header -->
<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./img/background1.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="index.html">
                        <img class="logo" src="img/favicon.ico" alt="logo">
                        <img class="logo-alt" src="img/logo.png" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <span></span>
                </div>
                <!-- /Collapse nav button -->
            </div>
            <?php if (logged_in()==true) {
                $user = $_SESSION['username'];
            }
            $u = "select * from student where username = '$user'";
            $result = $db->query($u); ?>
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM courses WHERE id = '$id'";
            $courses = $db->query($sql);
            $c = mysqli_fetch_assoc($courses);
            $code = $c['c_code'];
            $cname = $c['c_name'];
            ?>

            <!--use again because first one is already assigned, for remove data.php-->
            <?php
            $i = $_GET['id'];
            $sq = "SELECT * FROM courses WHERE id = '$i'";
            $cour = mysqli_query($db, $sq);
            ?>


            <!--fetch data from enrolled_course table-->
            <?php
            $enrolled = "SELECT * FROM enrolled_courses WHERE user_name = '$user'";
            $enrolled_results = mysqli_query($db, $enrolled);
            $data = mysqli_fetch_assoc($enrolled_results);
            ?>


            <!--used again because in first is already assigned-->
            <?php
            $enro = "SELECT * FROM enrolled_courses WHERE user_name = '$user'";
            $enro_results = mysqli_query($db, $enro);
            ?>


            <!--see whether the student is already enrolled-->
            <?php
            $query = "select c_code from enrolled_courses where user_name = '$user'";
            $values = mysqli_query($db, $query);

            //get enrolled students course codes
            $array = array();
            if (mysqli_num_rows($values) > 0) {
                while ($row = mysqli_fetch_assoc($values)) {
                    $array[] = $row;
                }
            }
            for ($p = 0; $p <= mysqli_num_rows($values) - 1; $p++) {

                if ($array[$p]['c_code'] == $code) {
                    break;
                }
            } ?>


            <!--  Main navigation  -->
            <ul class="main-nav nav navbar-nav navbar-right">
                <li><a href="course.php">Home</a></li>
                <li><a href="#course"><?= $c['c_code'].' - '.' '.$c['c_name']; ?></a></li>
                <li><a href="#comments">Comments Section</a></li>

                <!--this will get all the enrolled courses-->
                <?php if ($data['user_name'] == $user) {
                    echo '<li class="has-dropdown"><a href="#">My Courses</a>
            <ul class="dropdown">';
                    while ($da = mysqli_fetch_array($enro_results)) {
                        echo '<li><a href="materials.php?id='; echo $da['c_id']; echo '">'; echo $da['c_name']; echo '</a></li>';
                    }
                    echo '</ul>
            </li>';
                } ?>

                <li class="has-dropdown"><a href="#">Libraries</a>
                    <ul class="dropdown">
                        <li><a href="references.php">References</a></li>
                        <li><a href="papers.php">Past Papers</a></li>
                    </ul>
                </li>

                <?php if(isset($array[$p]['c_code'])){
                    if($array[$p]['c_code'] == $code){
                        while ($cs = mysqli_fetch_array($cour)){
                            echo '<li><a href="removedata.php?id='; echo $cs['id'];echo '">'; echo 'Unenrol me'; echo '</a></li>';
                        }
                    }
                }?>


                <?php while ($d = mysqli_fetch_assoc($result)) { ?>
                    <li class="has-dropdown"><a href="#">Hello, &nbsp;<?= $d['fname'].' '.' '.$d['lname']; ?></a>
                        <ul class="dropdown">
                            <li><a href="userprofile.php">User Profile</a></li>
                            <li>
                                <a href="https://mail.google.com" target="_blank">
                                    Student Email</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
                            <?php if(isset($array[$p]['c_code'])){
                                if($array[$p]['c_code'] == $code){
                                    while ($cs = mysqli_fetch_array($cour)){
                                        echo '<li><a href="removedata.php?id='; echo $cs['id'];echo '">'; echo 'Unenrol me'; echo '</a></li>';
                                    }
                                }
                            }?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <!-- /Main navigation -->

        </div>
    </nav>
    <!-- /Nav -->

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text"><?= $c['c_code'].' - '.' '.$c['c_name']; ?></h1>
                        <h4 class="white-text">Lecture Incharge : Mr/Ms. <?= $c['c_incharge']; ?>
                        </h4>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>
<!-- /Header -->
<!-- Contact -->
<div id="course" class="section sm-padding">

    <!-- Container -->
    <div class="container">

        <!--check already enrolled if check open assignments-->
        <?php if (isset($array[$p]['c_code'])) {
            if ($array[$p]['c_code'] == $code) {

                echo '<div id="course" class="section sm-padding">
              <!-- Container -->
              <div class="container">

              <input type="hidden" name="mc_code" value="';
                echo $c['c_name'];
                echo '">';

                $ecourse = $c['c_name'];
                $sql = "SELECT * FROM tbl_file WHERE course = '$ecourse'";
                $cour = $db->query($sql);
                $sql1 = "SELECT * FROM tbl_asses WHERE course = '$ecourse'";
                $ass = $db->query($sql1);

                echo '<!-- Row-->
              <div class="row">
              </div>
              <!--Row -->
              <!--Data Table area Start-->
              <div class="data-table-area">
              <div class="container">
              <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="data-table-list">
              <div class="row">
              <div class="col-sm-6">
              <div class="card text-center">
              <div class="card-body">
              <h5 class="card-title">';
                echo 'Lectures';
                echo '</h5>
              <div class="table-responsive">
              <table id="data-table-basic" class="table table-striped">
              <thead>
              <tr>
              <th class="text-center">';
                echo 'Name';
                echo '</th>
              <th class="text-center">';
                echo 'File';
                echo '</th>
              <th class="text-center">';
                echo 'View';
                echo '</th>
              <th class="text-center">';
                echo 'Download';
                echo '</th>
              </tr>
              </thead>
              <tbody>';
                while ($l = mysqli_fetch_assoc($cour)) {
                    echo '<tr>
                <td>';
                    echo $l['name'];
                    echo '</td>
                <td>';
                    echo $l['image'];
                    echo '</td>
                <td><a href="Admin/Lecturer/lecs/upload/';
                    echo $l['image'];
                    echo '"';
                    echo 'target="_blank">';
                    echo 'View';
                    echo '</a></td>
                <td><a href="Admin/Lecturer/lecs/upload/';
                    echo $l['image'];
                    echo '"';
                    echo 'download>';
                    echo 'Download';
                    echo '</td></tr>
                </tr>';
                }
                echo '</tbody>
              </table>
              </div>
              <!-- <a href="lecs/index.php" class="btn btn-primary">Click Here</a> -->
              </div>
              </div>
              </div>
              <div class="col-sm-5">
              <div class="card text-center">
              <div class="card-body">
              <h5 class="card-title">';
                echo 'Assignments';
                echo '</h5>
              <div class="table-responsive">
              <table id="data-table-basic" class="table table-striped">
              <thead>
              <tr>
              <th class="text-center">';
                echo 'Name';
                echo '</th>
              <th class="text-center">';
                echo 'Assignment';
                echo '</th>
              <th class="text-center">';
                echo 'Download';
                echo '</th>
              </tr>
              </thead>
              <tbody>';
                while ($l = mysqli_fetch_assoc($ass)) {
                    echo '<tr>
                <td><a href="ass.php?id='; echo $l['id']; echo '">';
                    echo $l['name'];
                    echo '</a></td>
                <td>';
                    echo $l['file'];
                    echo '</td>
                <td><a href="Admin/Lecturer/assignments/upload/';
                    echo $l['file'];
                    echo '"';
                    echo 'download>';
                    echo 'Download';
                    echo '</td></tr>
                </tr>';
                }
                echo '</tbody>
              </table>
              </div>
              </div>
              </div>
              </div>
              </div>
              <br><br><br>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>';
            }

        }else {
            echo '<div class="row">
            <form method="post" name="codeSearch" class="text-center">
            <input type="text" id="co" placeholder="Enter Key here !" name="co"  style="width: 200px; height: 35px"><input type="button" name="enroll" value="Enroll" id="enroll" class="example_a" >
            </form>
            </div>';
        }?>
        <!-- Data Table area End-->
    </div>
</div>
<!-- /Container -->

</div>
<!-- /Contact -->

<?php
$sql_f = "SELECT * FROM feedback WHERE course = '$ecourse' ORDER BY id DESC LIMIT 7";
$comments = $db->query($sql_f);

?>

<!-- About us Us -->
<div id="comments" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- About us content -->
            <div class="col-md-13">
                <div class="section-header text-center">
                    <h3 class="title">Comments Section</h3>
                </div>
                <div class="wrapper">
                    <div class="comment-wrapper">
                        <h4 class="comment-title">User feedback .....</h4>

                        <div class="comment-insert">
                            <h5 class="who-says">Says: <?= $user; ?></h5>

                            <form role="form" method="post" action="./Comment.php">
                                <input type="hidden" name="uname" id="uname" value="<?= $user; ?>">
                                <input type="hidden" name="cour_name" id="cour_name" value="<?= $ecourse; ?>">
                                <input type="hidden" name="pageid" id="pageid" value="<?= $_GET['id']?>">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea name="comment" id="comment" placeholder="Enter Your feedback ..." cols="5" required="Please Enter Comment"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-11 col-sm-12">
                                        <button type="submit" name="add_comment" id="add_comment" class="btn btn-info">Post</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="comments-list">
                        <ul class="comments-holder-ul">

                            <?php while ($comment = mysqli_fetch_assoc($comments)) { ?>
                                <li class="comment-holder" id="_1">
                                    <div class="user-img">
                                        <img src="img/dummy.jpg" class="user-img-pic">
                                    </div>

                                    <div class="comment-body">
                                        <h6 class="username-field">
                                            <?= $comment['name']; ?>
                                        </h6>
                                        <div class="comment-text">
                                            <?= $comment['comment']; ?>
                                        </div>
                                    </div>

                                    <div class="comment-buttons-holder">

                                        <form role="form" method="post" action="./Comment.php">
                                            <input type="hidden" name="pageid" id="pageid" value="<?= $_GET['id']?>">

                                            <input type="hidden" name="delete_id" id="delete_id" value="<?= $comment['id']; ?>">
                                            <button type="submit" class="btn btn-info" name="del_com" id="del_com">
                                                <span class="glyphicon glyphicon-remove"></span></button>
                                        </form>

                                    </div>

                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /About us us content -->

    </div>
    <!-- /Row -->

</div>
<!-- /Container -->

</div>
<!-- /About Us -->



<!-- Footer -->
<footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright © 2019. All Rights Reserved.</p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<!-- /Footer -->

<!-- Back to top -->
<div id="back-to-top"></div>
<!-- /Back to top -->

<!-- Preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- /Preloader -->

<!-- jQuery Plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script>

    // insert data to enrolled course table
    $(document).ready(function () {
        $("#enroll").click(function () {
            let id = "<?php echo $id?>";
            let user = "<?php echo $_SESSION['username']?>";

            var result = "<?= $c['c_code']?>";
            var code = document.getElementById('co').value;

            if (code != '') {
                if (result == code) {
                    $.ajax({
                        url: 'insertdata.php',
                        type: "POST",
                        data: {id: id, username: user},
                        success: function (data) {
                            swal({
                                title: "Completed!",
                                text: "You have successfully enrolled for this course..",
                                icon: "success",
                                button: "Great!!",
                            }).then(function () {
                                location.reload();
                            });
                        },
                        error: function () {
                            alert('Err');
                        }
                    });
                } else {
                    swal("Not completed!", "Wrong enrollment key..", "error");
                    return false;
                }
            } else {
                swal("Not completed!", "Please enter enrollment key..", "info");
                return false;
            }

        });
    });

</script>

</body>

</html>
