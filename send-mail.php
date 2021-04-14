<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'GoPassCS@gmail.com';                     // SMTP username
    $mail->Password   = '!GoPass34';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('GoPassCS@gmail.com', 'GoPass');
    $mail->addAddress($_POST["receiver"]);

    $file_name = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
    $mail->addAttachment($file_name);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = $_POST["message"];

    $mail->send();
    echo '<script type="text/javascript">';
    echo ' alert("Messege sent!!")';  //not showing an alert box.
    echo '</script>';
    header("refresh:1; url=profile1.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
}