<!DOCTYPE html>

<?php
include('db/dbcon.php');
session_start();
require_once("admin_status.php");
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
if (logged_in()==true) {
  $e = $_SESSION['email'];
}
$s = "select * from user where email = '$e'";

$result = $db->query($s);

while ($c = mysqli_fetch_assoc($result)) {

?>
  <p> Hello <?=$c['fname']; ?></p>
<?php
}

 ?>


  </body>
</html>
