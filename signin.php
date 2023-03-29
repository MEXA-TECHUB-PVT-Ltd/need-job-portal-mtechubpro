<?php
session_start();
include('include/db.php');
if (isset($_POST['add'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $sql = "Select * from users where email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {

        while ($data = mysqli_fetch_assoc($result)) {

            $_SESSION['id'] = $data['id'];
            $id = $_SESSION['id'];
            $_SESSION['email'] = $data['email'];

            $_SESSION['qualificiation'] = $data['qualificiation'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            $_SESSION['role'] = $data['role'];
            $role = $_SESSION['role'];
            header("location:index.php");
        }
    } else {

        $_SESSION['status_title'] = "Email or Password is invalid.";
        $_SESSION['status_text'] = "Email or Password is invalid.";
        $_SESSION['status_code'] = 'warning';
        header("location:login.php");
    }
}
