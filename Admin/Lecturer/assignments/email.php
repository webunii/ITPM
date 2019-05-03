
<?php
require 'PHPMailer/PHPMailerAutoload.php';// require this
//require 'PHPMailer/class.phpmailer.php';
$mail = new PHPMailer;//create an object

    $mail->isSMTP();
//    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;


    $mail->Username = 'kushib96@gmail.com';
    $mail->Password = 'kushi12345';

    $mail->setFrom('kushib96@gmail.com', "Kushi");
    $mail->addAddress("dinukakulatunga@gmail.com");
    $mail->addAddress("majchemachandra@gmail.com");
    $mail->addReplyTo("kushib96@gmail.com");

    $mail->IsHTML(true);
    $mail->Subject  = 'Webuni';
    $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';

if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    header("location:index.php");
}


?>