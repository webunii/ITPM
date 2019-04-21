<?php
include_once('db/dbcon.php');
$db = mysqli_connect('127.0.0.1','root','','webuni');
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '. mysqli_connect_error();
    die();
}



    $id = $_POST['id'];
    $user = $_POST['username'];
    $sql = "SELECT * FROM courses WHERE id = '$id'";
    $courses = $db->query($sql);
    $c = mysqli_fetch_assoc($courses);

    $u = "select * from student where username = '$user'";
    $result = $db->query($u);
    $val = mysqli_fetch_assoc($result);
    $stid = $val['id'];
    $code = $c['c_code'];
    $cname = $c['c_name'];


    try{
        $l = "INSERT INTO `enrolled_courses`(`en_id`,`st_id`, `c_id`, `c_code`, `c_name`, `user_name`) VALUES (' ','$stid','$id','$code','$cname','$user')";
        $m = $db->query($l);

        if($m === true){
            $message = "Enrolled and added to the db";
            echo json_encode(array(
                "message"=>$message,
                "error"=>false
            ));
        }
    }catch (\mysql_xdevapi\Exception $e){
        echo $e;

    }







