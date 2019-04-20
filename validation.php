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
$username = $_POST['username'];
$pw = $_POST['password'];
$password = md5($pw);
//get details about username from Database
$s = "select * from student where username = '$username' && password = '$password'";

//create and store results query
$result = mysqli_query($db, $s);

//count number of rows
$num = mysqli_num_rows($result);

// check that username is already exist
if($num == 1){
  //store the username using session
  $_SESSION['username'] = $username;
  header('location:main.php');
}else {
  header('location:login.php');
}

?>
