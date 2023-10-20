<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '20081010249@student.upnjatim.ac.id'; 
    // $mail->Username   = 'emailpengirim';                     // SMTP username
    $mail->Password   = 'Dimassp*2002'; 
    // $mail->Password   = 'passwordemailpengirim';                               // SMTP password
    $mail->SMTPSecure = 'TLS';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('20081010249@student.upnjatim.ac.id', 'Dimas Satria P.');
    // $mail->setFrom('emailpengirim', 'namapengirim');
    $mail->addAddress('emailpenerima', 'namepenerima');     // Add a recipient


    // Attachments
    $mail->addAttachment('document.pdf', 'document.pdf');
    // $mail->addAttachment('phpmailer-min.png', 'image.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}