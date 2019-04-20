
<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Admin Sign In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="index1/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="index1/css/style.css" />
		<link rel="stylesheet" type="text/css" href="index1/css/animate-custom.css" />
    </head>
    <body>
      <!-- Background Image -->
      <!-- <div class="bg-img" style="background-image: url('img/background1.jpg');">
        <div class="overlay"></div>
      </div> -->
      <!-- /Background Image -->
        <div class="container">
          <br>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                    <div id="login" class="animate form">
                            <form  action="validate.php" autocomplete="on" method="post">
                                <h1>Sign In</h1>
                                <p>
                                    <label for="email" class="uname" data-icon="u" > Your Email </label>
                                    <input id="email" name="email" required="required" type="text" placeholder="abc@gmail.com"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p class="keeplogin">
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
									<label for="loginkeeping">Keep me logged in</label>

								</p>
                <p class="login button">  <input type="submit" value="Sign In" /></p>

                <p class="change_link"><a href="../login.php">User Login</a></p>

                </form>
              </div>

              </div>
                </div>
            </section>
        </div>
    </body>
</html>
