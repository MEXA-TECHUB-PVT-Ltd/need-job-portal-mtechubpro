<?php


include('../include/db.php');
session_start();
$userid = $_SESSION['id'];


if (isset($_POST['save'])) {
    $job_id = $_POST['jobid'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $interview_timmings = $_POST['interview_timmings'];
    $jobrelocation = $_POST['jobrelocation'];

    $candidate_name = $_POST['candidate_name'];

    $email_address = $_POST['email_address'];
    $address = $_POST['address'];

    $phone = $_POST['phone'];

    $uniq = uniqid();

    // upload doc
    $target_dir = "../assets/";
    $filename = basename($_FILES["file"]["name"]);
    $filename2 = basename($_FILES["file"]["name"]);
    $filename = preg_replace('/\s+/', '_', $filename);
    $info = pathinfo($_FILES["file"]["name"]);
    $name = $uniq . $filename;
    $target_file = $target_dir . $uniq . $filename;
    $dbPath = "assets/" . $uniq . $filename;
    $size = $_FILES["file"]["size"];
    echo "iout  file";
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "imin file";
        $sql = "INSERT INTO apply_job (user_id,job_id,experience,qualification,interview_timmings,jobrelocation,candidate_name,email_address,address,phone,resume) VALUES ('$userid','$job_id','$experience','$qualification','$interview_timmings','$jobrelocation','$candidate_name','$email_address','$address','$phone','$dbPath')";

        $query = mysqli_query($conn, $sql);

        if ($query) {


            $_SESSION['status_text'] = "You Have Applied for Job";
            $_SESSION['status_title'] = "";
            $_SESSION['status_code'] = "success";
            header('location: ../index.php');
        } else {
            $_SESSION['status_text'] = "You Did'nt Applied for Job";
            $_SESSION['status_title'] = "";
            $_SESSION['status_code'] = "error";
            header('location: ../index.php');
        }
    }
}
