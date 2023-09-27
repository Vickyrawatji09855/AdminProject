<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';

    if(isset($_POST['submit'])){
        $name= $_POST['your-name'];
        $email= $_POST['your-email'];
        $phone= $_POST['your-phone'];
        $message= $_POST['your-message'];
       
    }
    $mail = new PHPMailer(true);
    try {
        // Server settings
        // $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'vickyrawatji855@gmail.com';                     // SMTP username
        $mail->Password   = 'kwbnojpaichzlchh';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        // Recipients
        $mail->setFrom('from@example.com', 'Kaam-25');
        $mail->addAddress('vickyrawatji855@gmail.com', 'vicky');     // Add a recipient
        $mail->addAddress('guynew114@gmail.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        // Attachments
        // $mail->addAttachment('C:/xampp/htdocs/exportpdf/export.pdf');         // Add attachments
        // $mail->addAttachment('logo.png');    // Optional name
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Subject yeah hai ki subject rakhna anaa chiye, code toh bandar bhi kar leta hai';
        $mail->Body    = 'name='.$name.'<br>email='.$email.'<br>phone='.$phone.'<br>message='.$message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } catch(Exception $e){
        echo " Not Able to sent Message ";
    }

?>
