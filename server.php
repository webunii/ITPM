<?php

//start session
session_start();

//go to the login page if register Successfully
header('location:login.php');

include 'db/dbcon.php';
// $db = mysqli_connect('127.0.0.1','root','root','webuni');
//select db
mysqli_select_db($db, 'webuni');

//store data
$fname = $_POST['fnamesignup'];
$lname = $_POST['lnamesignup'];
$username = $_POST['usernamesignup'];
$email = $_POST['emailsignup'];
$phone = $_POST['contactsignup'];
$pw = $_POST['passwordsignup'];
//$cpw = $_POST['passwordsignup_confirm'];

//get details about username from Database
$s = "select * from student where username = '$username' and email = '$email'";

//create and store results query
$result = mysqli_query($db, $s);

//count number of rows
$num = mysqli_num_rows($result);

// check that username is already exist
if($num == 1){
//  echo '<div class="alert alert-warning"><strong>Warning!</strong>
  // User Already Exist.&nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
  //
  // $msg = "User Already Exist";

}else {
  $password = md5($pw);
  //insert query
  $reg = "insert into student(fname, lname, username, email, phone, password)
  values ('$fname', '$lname', '$username', '$email', '$phone', '$password')";
  //execute the insert query
  mysqli_query($db, $reg);
//  $msg = "Registered Successfully";
  //echo '<script type="text/javascript">alert(\"$msg\");</script>';
}

?>
