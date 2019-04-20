<html>
<body>
<div class="timer">
	<div class="main">
		<center><h1>Assesment Submission</h1></center>
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
          <table>
            <tr>
            <td ><style='font-size:20;'>Due date </style></td>
            <td></td>
            <td><?php echo "<style='font-size:20;'>".$date."</h2></center>"; ?></td>
           </tr>
            <tr>
            <td><style='font-size:20;'>Time remaining </style>
            <td></td>
            <td><div id="demo"><style='font-size:20;'></style></div >
            </td>
          </tr>
          </table>
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
</head>
<body>
    <div class="timerp"  class="agileits_w3layouts_para" id="demo"></div >
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
