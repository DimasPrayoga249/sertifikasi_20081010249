<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$email_penerima=$_POST['email'];
$nama_penerima=$_POST['nama'];
$pesan=$_POST['pesan'];
$subjek=$_POST['subjek'];
$file_attachments=$_FILES['attachment']['tmp_name'];
$name_attachments=$_FILES['attachment']['name'];

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username = '20081010249@student.upnjatim.ac.id';
    // $mail->Username   = 'emailpengirim';                     // SMTP username
    $mail->Password   = 'Dimassp*2002';
    // $mail->Password   = 'passwordemailpengirim';                               // SMTP password
    $mail->SMTPSecure = 'TLS';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('20081010249@student.upnjatim.ac.id', 'Dimas Satria P.');
    
    $mail->addAddress($email_penerima, $nama_penerima);     // Add a recipient


    // Attachments
    $mail->addAttachment($file_attachments, $name_attachments);    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjek;
    $mail->Body    = $pesan;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}