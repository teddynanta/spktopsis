<?php
session_start();
include "../koneksi.php";
include "creds.php";
$id = $_GET['id'];
$uid = $_GET['uid'];

$stmt = $koneksi->prepare("UPDATE tab_pengajuan SET status = 'Diterima' WHERE id_pengajuan = ?");
$stmt->bind_param("s", $id);

$users = $koneksi->query("SELECT * FROM users WHERE id = $uid");
$user = $users->fetch_assoc();
$recipient = $user['email'];
$nama = $user['nama'];
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

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
$mail->Username = USERNAME;

//Password to use for SMTP authentication
$mail->Password = PASS;
// $mail->Password = '';

//Set who the message is to be sent from
//Note that with gmail you can only use your account address (same as `Username`)
//or predefined aliases that you have configured within your account.
//Do not use user-submitted addresses in here
$mail->setFrom(USERNAME, NAME);

//Set an alternative reply-to address
//This is a good place to put user-submitted addresses
$mail->addReplyTo(USERNAME, NAME);

//Set who the message is to be sent to
$mail->addAddress($recipient, 'Recipient');

//Set the subject line
$mail->Subject = 'Notifikasi Pengajuan Kredit';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
$mail->Body = 'Selamat Bapak/Ibu ' . $nama . ', pengajuan kredit Anda dengan No. ' . $id . ' telah Diterima dan Disetujui. Oleh karena itu, untuk proses selanjutnya silahkan datang ke kantor dengan membawa formulir yang dapat di-download di halaman Home pada akun Anda. Terima Kasih.';

//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  $stmt->execute();
  echo 'Message sent!';
  header("Refresh: 1; URL=index.php"); // Redirect to login.html after 3 seconds
  //Section 2: IMAP
  //Uncomment these to save your message in the 'Sent Mail' folder.
  #if (save_mail($mail)) {
  #    echo "Message saved!";
  #}
}
