<?php

require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
require '../phpmailer/Exception.php';

// define name space
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// create instance of phpmailer
$mail = new PHPMailer();

include('../include/db.php');
session_start();
if (isset($_POST['ADD'])) {
  $email = $_POST['email'];
  $_SESSION['email'] = $_POST['email'];
}



$exsist = 0;
$sql = "SELECT * FROM users where email='$email'";

$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
  if ($row['email'] == $email) {
    $exsist = 1;


    break;
  }
}
if ($exsist == 1) {
  $otp = rand(10000, 99999);

  $sqll = "UPDATE users SET otp_code='$otp' where email = '$email'";

  $queryl = mysqli_query($conn, $sqll);

  // set mailer to use smtp
  $mail->isSMTP();
  // define smtp host
  $mail->Host = "smtp.gmail.com";
  // enable smtp authentication
  $mail->SMTPAuth = true;
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

  // set type of encryption (ssl/tls)
  $mail->SMTPSecure = "tls";
  // set port to connect smtp
  $mail->Port = "587";
  // set gmail username
  $mail->Username = "fatimagull863@gmail.com";
  // set gmail password
  $mail->Password = "pjoyvljnfdsdiyro";
  // set email subject
  $mail->Subject = "MtechHub Job Portal OTP Verification Code";
  // set sender email
  $mail->setFrom('no-reply@jobportal.com');
  // email body
  $mail->Body = "Your OTP is " . $otp;
  // add recipient
  $mail->addAddress($email);
  // finally send email
  if ($mail->send()) {
    if (isset($_POST['ADD'])) {
      $mail = new PHPMailer(true);

      $_SESSION['status_text'] = "OTP Sent.";
      $_SESSION['status_title'] = "Success";
      $_SESSION['status_code'] = "success";
    } else {
      $_SESSION['status_text'] = "OTP Resent.";
      $_SESSION['status_title'] = "Success";
      $_SESSION['status_code'] = "success";
    }
    header("location:../verify-otp.php");
  } else {
    $mail = new PHPMailer(true);

    $_SESSION['status_text'] = "in Sending OTP";
    $_SESSION['status_title'] = "Error";
    $_SESSION['status_code'] = "error";
    header("location:../forgetpassword.php");
  }

  // close smtp connection
  $mail->smtpClose();
} else {

  $_SESSION['status_text'] = " User does not exist. ";
  $_SESSION['status_title'] = "Error";
  $_SESSION['status_code'] = "error";
  header("location:../forgetpassword.php");
}
?>
<?php include('../include/footerscripts.php'); ?>