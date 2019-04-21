<?php
require_once("user_status.php");
session_start();
$db = mysqli_connect('127.0.0.1','root','','webuni');
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
}


$id = $_GET['id'];
$sql = "SELECT * FROM courses WHERE id = '$id'";
$courses = $db->query($sql);
$c = mysqli_fetch_assoc($courses);
$code = $c['c_code'];
$cname = $c['c_name'];


    //remove query
    $remove = "DELETE FROM `enrolled_courses` WHERE c_code = '$code'";
    $delete = mysqli_query($db, $remove);
//    echo "deleted";
    header("Location: materials.php?id=" .$id);


    ?>

<script type="text/javascript">
    swal({
        title: "Completed!",
        text: "You have successfully enrolled for this course..",
        icon: "success",
        button: "Great!!",
        }).then(function () {
        window.location.href = "materials.php";
        });
</script>



