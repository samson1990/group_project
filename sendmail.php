<?php

    include("includes/functions.php");

    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])){

        $name = sanitize_data($_POST['name']);
        $email = sanitize_data($_POST['email']);
        $subject = sanitize_data($_POST['subject']);
        $body = sanitize_data($_POST['body']);
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer;

        //SMTP Settings
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'naanman10@gmail.com';
        $mail->Password = 'july10th1990';

        //Email Settings
        $mail->isHTML(isHtml:true);
        $mail->setFrom($email, $name);
        $mail->addAddress(address: 'theafricanchild19@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $body;

        //send the message, check for err ors
        if (!$mail->send()) {
            $response = "ERROR: " . $mail->ErrorInfo;
        } else {
            $response = "SUCCESS";
        }
    }
 