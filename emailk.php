<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'spktopsisadm@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'kkfb jkxo ptgh syrr';
// $mail->Password = 'log2edm3IN';

//Set who the message is to be sent from
//Note that with gmail you can only use your account address (same as `Username`)
//or predefined aliases that you have configured within your account.
//Do not use user-submitted addresses in here
$mail->setFrom('spktopsisadm@gmail.com', 'SPK Admin');

//Set an alternative reply-to address
//This is a good place to put user-submitted addresses
$mail->addReplyTo('spktopsisadm@gmail.com', 'SPK Admin');

//Set who the message is to be sent to
$mail->addAddress('teddynnt@gmail.com', 'Teddy Nanta');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
$mail->Body = 'asu klen';

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message sent!';
  //Section 2: IMAP
  //Uncomment these to save your message in the 'Sent Mail' folder.
  #if (save_mail($mail)) {
  #    echo "Message saved!";
  #}
}

// // Import PHPMailer classes into the global namespace 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// // Include library files 
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// // Create an instance; Pass `true` to enable exceptions 
// $mail = new PHPMailer;

// // Server settings 
// //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
// $mail->isSMTP();                            // Set mailer to use SMTP 
// $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
// $mail->SMTPAuth = true;                     // Enable SMTP authentication 
// $mail->Username = 'spktopsisadm@gmail.com';       // SMTP username 
// $mail->Password = 'kkfb jkxo ptgh syrr';         // SMTP password 
// $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
// $mail->Port = 465;                          // TCP port to connect to 

// // Sender info 
// $mail->setFrom('spktopsisadm@gmail.com', 'SPK Admin');
// $mail->addReplyTo('spktopsisadm@gmail.com', 'SPK Admin');

// // Add a recipient 
// $mail->addAddress('kuropantsu99@gmail.com');

// //$mail->addCC('cc@example.com'); 
// //$mail->addBCC('bcc@example.com'); 

// // Set email format to HTML 
// $mail->isHTML(true);

// // Mail subject 
// $mail->Subject = 'Email from Localhost by CodexWorld';

// // Mail body content 
// $bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>';
// $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>';
// $mail->Body    = $bodyContent;

// // Send email 
// if (!$mail->send()) {
//   echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
// } else {
//   echo 'Message has been sent.';
// }


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;


// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// $email = htmlspecialchars($_POST['email']);
// $judul = htmlspecialchars($_POST['judul']);
// $pesan = htmlspecialchars($_POST['pesan']);

// $mail = new PHPMailer(true);

// try {
//   $mail->SMTPDebug = 2;
//   $mail->isSMTP();
//   $mail->Host       = 'smtp.gmail.com';
//   $mail->SMTPAuth   = true;
//   // email aktif yang sebelumnya di setting
//   $mail->Username   = 'spktopsisadm@gmail.com';
//   // password yang sebelumnya di simpan
//   $mail->Password   = '';
//   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//   $mail->Port       = 587;

//   $mail->setFrom('mail@gmail.com', 'tutorial malasngoding');
//   $mail->addAddress($email);
//   $mail->isHTML(true);
//   $mail->Subject = $judul;
//   $mail->Body = $pesan;
//   $mail->send();
//   header("location:index.php?alert=berhasil");
// } catch (Exception $e) {
//   header("location:index.php?alert=gagal");
// }
