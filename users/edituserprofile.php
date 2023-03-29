<?php
include('../include/db.php');
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header('location:login.php');
}
if (isset($_POST['update'])) {

    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];

    $about_me = $_POST['about_me'];
    $address = $_POST['address'];
    $qualificiation = $_POST['qualificiation'];

    $designation = $_POST['designation'];
    $sql = "UPDATE users
SET first_name = '$first_name', last_name = '$last_name',email='$email',qualificiation='$qualificiation',address='$address',phone='$phone_no',about_me='$about_me',designation='$designation'
WHERE id='$id'";

    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['status_title'] = "success";
        $_SESSION['status_text'] = "Profile Updated";
        $_SESSION['status_code'] = "success";
        header('location:../profile.php');
    }
}
