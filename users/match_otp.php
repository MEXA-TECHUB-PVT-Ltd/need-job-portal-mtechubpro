<?php

include('../include/db.php');
session_start();
 $email = $_SESSION['email'];

$code = $_POST['code1'] . $_POST['code2'] . $_POST['code3'] . $_POST['code4'] . $_POST['code5'];

$exsist = 0;
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    if ($row['otp_code'] == $code) {
        $exsist = 1;
        break;
    }
}
if ($exsist == 1) {
    $sqll = "UPDATE users SET otp_code='0' where email = '$email'";
    $queryl = mysqli_query($conn, $sqll);
    $_SESSION['status_text'] = "Otp Matched";
    $_SESSION['status_title'] = "Success";
    $_SESSION['status_code'] = "success";
    header("location:../new-password.php");
} else {
    $_SESSION['status_text'] = "Otp Not Matched";
    $_SESSION['status_title'] = "Error";
    $_SESSION['status_code'] = "error";
    header("location:../verify-otp.php");
}
