<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



// Instantiation and passing `true` enables exceptions

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


function sendMail($sendToEmail, $sendToFullName, $subject, $body)
{
    global $configEmail;
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = $configEmail["smtp_host"];                    // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $configEmail["smtp_user"];                    // SMTP username
        $mail->Password   = $configEmail["smtp_pass"];                               // SMTP password
        $mail->SMTPSecure = $configEmail["smtp_secure"] ;                                 // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = $configEmail["smtp_port"];
        $mail->CharSet    = $configEmail["charset"];                                // TCP port to connect to
    
        //Recipients

        $mail->setFrom($configEmail["smtp_user"], $configEmail["smtp_fullname"]);
        $mail->addAddress($sendToEmail, $sendToFullName);     // Add a recipient
        
        // $mail->addAddress('ellen@example.com');               // Name is optional
        
        $mail->addReplyTo($configEmail["smtp_user"], $configEmail["smtp_fullname"]);
        
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        // Attachments
        // $mail->addAttachment('attach/hoa.jpg');         // Add attachments
        
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }
}