<?php
header('Content-Type: text/html; charset=UTF-8');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/Exception.php';


if (isset($_POST['submit'])) {
    $name = mb_encode_mimeheader($name, 'UTF-8');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = mb_encode_mimeheader($message, 'UTF-8');
    $message = $_POST['message'];
    $type = mb_encode_mimeheader($type, 'UTF-8');
    $type = $_POST['type'];
 
    $mailer = new PHPMailer(true);
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'zardiashvili401@gmail.com';
    $mailer->Password = 'xbtenodbjkoynigy';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;
    

    // Set sender and recipient
    $mailer->setFrom($email,mb_encode_mimeheader($name));
    $mailer->addAddress('zardiashvili401@gmail.com', 'zzz077');
    $mailer->addReplyTo($email);

   
    $mailer->isHTML(true); 
    $type = mb_encode_mimeheader($type, 'UTF-8');
    $mailer->Subject = $type;
    $mailer->Body ='<h2>email Request Received</h2>
    <p><b>Client Email:</b>'.$email.'</p>
    <p><b>Client Name:</b>'.$name.'</p>
    <p><b>Message:</b>'.$message.'</p>
    ';

  
    // Send email
    if ($mailer->send()) {
      
        $msg="Message sent successfully!";
        header("location: ../contact.php");
    } else {
        echo "Failed to send email. Error: " . $mailer->ErrorInfo;
    }


    
}



?>