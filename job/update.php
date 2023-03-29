<?php
session_start();
include 'include/db.php';
$period = $_POST['period'];
$contract = $_POST['contract'] . '' . $period;
$salary = $_POST['salary'];
$country = $_POST['country'];
$company_name = $_POST['company_name'];
$jobadvertise = $_POST['jobadvertise'];
$job_title = $_POST['job_tite'];
$periodsalary = $_POST['periodsalary'];
$description = $_POST['description'];
$language = $_POST['language'];
$salary = $_POST['salary'] . '' . $periodsalary;


$jobtitle = $_POST['jobtitle'];
$jobtype = $_POST['jobtype'];
$language = $_POST['language'];
$sql = "UPDATE add_job SET country='$country',language='$language',company_name='$company_name', job_title='$job_title',advertise_location='$job_advertise',job_type='$job_type' ,contact='$contract',job_pay='$salary',job_description='$job_description'WHERE id='$_POST[id]'";

if (mysqli_query($conn, $sql)) {

    $_SESSION['status_title'] = "New Job Added.";
    $_SESSION['status_text'] = "New Job Added.";
    $_SESSION['status_code'] = 'Success';
    header("location:addjkjhgob.php");
} else {

    $_SESSION['status_title'] = "New Job Not Added.";
    $_SESSION['status_text'] = "New Job Not Added.";
    $_SESSION['status_code'] = 'Warning';
    header("location:addkjhjob.php");
}
