<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail Form Localhost In Php</title>
    <link rel="stylesheet" href="mail.css">
</head>


<body>
    <div id="container">
    <h2>Send Message</h2>
    <form method="post" enctype="multipart/form-data">

    <input type="email" name="receiver" placeholder="Email"><br>
    <input type="text" name="subject" placeholder="Subject"><br>
    <textarea name="message" placeholder="Enter Your Message Here."></textarea><br>
    <input type="file"  name="file" />
    <input type="submit" name="send" value="Send">

    </form>
    </div>


</body>
    <?php

    if(isset($_POST("submit"))) {
        require "PHPMailer-master/PHPMailer.php";
        require "vendor/autoload.php";

$mail = new PHPMailer(true);

try {
    $sender = "gopasscustomer@gmail.com"
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $sender;                    //SMTP username
    $mail->Password   = '!GoPass34';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($sender, 'Mailer');
    $mail->addAddress('$_POST["receiver"]');     //Add a recipient
    
    $file_name =  $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

    //Attachments
    $mail->addAttachment($file_name);         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = $_POST["message"];
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    }

    ?>


</html>