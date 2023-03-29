<?php

include('../include/db.php');
session_start();
$sql = "DELETE FROM add_job WHERE  id='$_GET[id]'";
$result = mysqli_query($conn, $sql);
if ($result) {

    $sql1 = "select * FROM apply_job WHERE  job_id='$_GET[id]'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        $sql1 = "DELETE FROM apply_job WHERE  job_id='$_GET[id]'";
        $result1 = mysqli_query($conn, $sql1);
        $_SESSION['status_text'] = "Job Deleted.";
        $_SESSION['status_title'] = "Success";
        $_SESSION['status_code'] = "success";
        header('Location:../index.php');
    }
    $_SESSION['status_text'] = "Job Deleted.";
    $_SESSION['status_title'] = "Success";
    $_SESSION['status_code'] = "success";
}
