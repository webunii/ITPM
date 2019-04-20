<?php
//including the database connection file
include("config.php");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM timer ORDER BY id DESC"); // using mysqli_query instead
?>
<?php
				  while($res = mysqli_fetch_array($result)) {
             $date = $res['date'];
           }
?>
<?php
//including the database connection file
include("config.php");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM timer ORDER BY id DESC"); // using mysqli_query instead
?>
<?php
				  while($res = mysqli_fetch_array($result)) {
             $date = $res['date'];
             $h = $res['h'];
             $m = $res['m'];
             $s = $res['s'];
				  }
	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="dropzone/dropzone.css" />
<script type="text/javascript" src="dropzone/dropzone.js"></script>
<script type="text/javascript" src="js/upload.js"></script>
<title>Count Down</title>
  </head>
  <body>
		<br><br>
    <center><h1>Assesment Submission</h1></center>
    <table align="center">
      <tr>
      <td >Due date </style></td>
      <td><?php echo "<style='font-size:20;'>".$date."</h2></center>"; ?></td>
     </tr>
      <tr>
      <td>Time remaining </style>
      <td><div id="demo"></div >
      </td>
    </tr>
    </table>
  <div>
    <br>
    <br>
		<div class="container">
    <div class="container">
	<div class="dropzone">
		<div class="dz-message needsclick">
			<strong>Drop files here or click to upload.</strong><br />
		</div>
	</div>
</div>
    <script>
    var countDownDate = <?php
    echo strtotime("$date $h:$m:$s" ) ?> * 1000;
    var now = <?php echo time() ?> * 1000;
    // Update the count down every 1 second
    var x = setInterval(function() {
      // Get todays date and time
        // 1. JavaScript
        // var now = new Date().getTime();
        // 2. PHP
        now = now + 1000;

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
    </script>
  </body>
</html>
