<?php
 function logged_in () {
 if (isset($_SESSION['email'])) {
 return true;
 } else {
 return false;
 }
 }

?>
