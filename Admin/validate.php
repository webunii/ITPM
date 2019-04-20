<?php

//start session
session_start();

include 'db/dbcon.php';
// $db = mysqli_connect('127.0.0.1','root','root','webuni');
//select db
mysqli_select_db($db, 'webuni');

//store data
$email = $_POST['email'];
$pw = $_POST['password'];
$password = md5($pw);
//get details about username from Database
$s = "select * from user where email = '$email' AND password = '$password'";

//create and store results query

$result = $db->query($s);

//count number of rows
$num = mysqli_num_rows($result);

// check that username is already exist
if($num == 1){
  //store the email using session
while ($c = mysqli_fetch_assoc($result)) {
   $_SESSION['email'] = $email;
  if ($c['email']==$email && $c['password']==$password && $c['role']==0) {
    header('location:index.php');
}elseif ($c['email']==$email && $c['password']==$password && $c['role']==1) {
   $_SESSION['email'] = $email;
  header('location:Lecturer/index.php');
}
}  //header('location:index.php');

}else {
    header('location:login.php');
}

?>
