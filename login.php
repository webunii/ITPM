
<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Sign In & Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="index1/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="index1/css/style.css" />
		<link rel="stylesheet" type="text/css" href="index1/css/animate-custom.css" />
            <script type="text/javascript" src="reg.js"></script>
    </head>
    <body>
        <div class="container">
          <br>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                    <div id="login" class="animate form">
                            <form  action="validation.php" autocomplete="on" method="post">
                                <h1>Sign In</h1>
                                <p>
                                    <label for="username" class="uname" data-icon="u" > Your Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="username"/>
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

                <p class="change_link">Not a member yet ?<a href="#toregister" class="to_register">Join us</a> | <a href="Admin/login.php">Admin Login</a></p>

                </form>
      </div>

                        <div id="register" class="animate form">
                            <form  action="server.php" method="post" name="myForm" onsubmit="return regvalidate()">
                                <h1> Sign up </h1>
                                <p>
                                    <label for="fnamesignup" class="name" data-icon="u">Your First Name</label>
                                    <input id="fnamesignup" name="fnamesignup" type="text" placeholder="eg. Chamodi" />
                                </p>
                                <p>
                                    <label for="lnamesignup" class="name" data-icon="u">Your Last Name</label>
                                    <input id="lnamesignup" name="lnamesignup" type="text" placeholder="eg. Rangani" />
                                </p>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Your Username</label>
                                    <input id="usernamesignup" name="usernamesignup" type="text" placeholder="eg. chamodi15" />
                                </p>
                                <p>
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your Email</label>
                                    <input id="emailsignup" name="emailsignup" type="email" placeholder="eg. mysupermail@gmail.com"/>
                                </p>
                                <p>
                                    <label for="contactsignup" class="contact" data-icon="p" > Your Contact Number</label>
                                    <input id="contactsignup" name="contactsignup" type="text" placeholder="eg. 0112345682/0752368923"/>
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                                    <input id="passwordsignup" name="passwordsignup" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm Your Password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"><input type="submit" value="Sign up"/></p>
                                <p class="change_link">Already a member ?
									              <a href="#tologin" class="to_register"> Go and Sign In </a></p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
