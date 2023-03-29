<?php
include('../include/db.php');
session_start();


if (isset($_POST['save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $emailaddress = $_POST['emailaddess'];
    $password = $_POST['password'];

    $Password1 = md5($password);
    $uniq = uniqid();
    //upload image
    $target_dir = "../assets/";
    $filename = basename($_FILES["image"]["name"]);
    $filename2 = basename($_FILES["image"]["name"]);
    $filename = preg_replace('/\s+/', '_', $filename);
    $info = pathinfo($_FILES["image"]["name"]);
    $name = $uniq . $filename;
    $target_file = $target_dir . $uniq . $filename;
    $dbPathimage = "assets/" . $uniq . $filename;
    $size = $_FILES["image"]["size"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


        $sql = "INSERT INTO users(email,first_name,last_name,password,image,role) VALUES ('$emailaddress','$first_name','$last_name','$Password1','$dbPathimage','JobSeeker')";

        $query = mysqli_query($conn, $sql);

        if ($query) {


            $_SESSION['status_text'] = "You Have Registered to our portal";
            $_SESSION['status_title'] = "";
            $_SESSION['status_code'] = "success";
            header('location: ../login.php');
        } else {
            $_SESSION['status_text'] = "You Did'nt  Registered to our portal";
            $_SESSION['status_title'] = "";
            $_SESSION['status_code'] = "error";
            header('location: ../login.php');
        }
    }
}
