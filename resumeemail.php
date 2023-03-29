<?php
include('include/db.php');
session_start();
$id = $_SESSION['id'];
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
// define name spaceswwww

// create instance of phpmailer
$userid = $_POST['userid'];
$job_id = $_POST['job_id'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$date = date("Y-m-d H:i:s");
$mail = new PHPMailer();


// set mailer to use smtpp
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
$mail->Subject = $subject;
// set sender email
$mail->setFrom('no-reply@beforevault.com');
// email body
$mail->Body = "Interview Message " . $message;
// add recipient
$mail->addAddress($to);
// finally send email
if ($mail->send()) {


        $FINALQUERY1 = "INSERT INTO Notification(user_id,message,status,from_id,job_id,date)Values('$userid','Check your Email the employer has Scheduled your Interview','unread','ADMIN','$job_id','$date')";
        $finalquery = mysqli_query($conn,  $FINALQUERY1);
        if ($finalquery) {
                $FINALQUERY2 = "INSERT INTO interview_scheduled(user_id,job_id)Values('$userid','$job_id')";
                $finalquery2 = mysqli_query($conn,  $FINALQUERY2);
                if ($finalquery2) {
                        $_SESSION['status_text'] = "Email Sent.";
                        $_SESSION['status_title'] = "Success";
                        $_SESSION['status_code'] = "success";
                        header("location:resumes.php");
                }
        }
} else {

        $_SESSION['status_text'] = "Error in Email Sending";
        $_SESSION['status_title'] = "Error";
        $_SESSION['status_code'] = "error";
        header("location:resumes.php");
}

// close smtp connection
$mail->smtpClose();
?>
<?php include('include/footerscripts.php'); ?>