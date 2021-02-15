<?php

    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['btnSend'])){
		if(empty($_POST['txt_name'])){
			$nameErr = "<p class='text-danger'>Please enter a name</p>";
		}else{
			$name = sanitize_data($_POST['txt_name']);
		}
		if(empty($_POST['subject'])){
			$subjectErr = "<p class='text-danger'>Please enter a name</p>";
		}else{
			$subject = sanitize_data($_POST['subject']);
		}
		if(empty($_POST['email'])){
			$emailErr = "<p class='text-danger'>Please enter a name</p>";
		}else{
			$email = sanitize_data($_POST['email']);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr = "<p class='text-info'>Invalid email format!</p>";
			}
		}
		if(empty($_POST['body'])){
			$bodyErr = "<p class='text-danger'>Please enter a name</p>";
		}else{
			$body = sanitize_data($_POST['body']);
        }
        
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
 