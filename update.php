<?php
require "db/dbcon.php";
if(isset($_REQUEST['id']))
{
  $id=$_REQUEST['id'];
  $fname=$_REQUEST['fname'];
  $lname=$_REQUEST['lname'];
  $username=$_REQUEST['username'];
  $email=$_REQUEST['email'];
  $contact=$_REQUEST['contact'];


  $sqlupdate="update student set fname='$fname', lname='$lname', username='$username', email='$email',
   phone='$contact' where id= $id ";

   echo $sqlupdate;
  $recordupdate=mysqli_query($db,$sqlupdate);
  if($recordupdate)
  {
    header("location:userprofile.php");	//refresh 3 second and redirect to index.php page
  }

}else{
  echo "string";
}

 ?>
