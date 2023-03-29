<?php
session_start();
include 'include/db.php';
$period = $_POST['period'];
$contract = $_POST['contract'] . '' . $period;
$salary = $_POST['salary'];
$country = $_POST['country'];
$company_name = $_POST['company_name'];
$jobadvertise = $_POST['jobadvertise'];
$periodsalary = $_POST['periodsalary'];
$description = $_POST['description'];

$salary = $_POST['salary'] . '' . $periodsalary;


$jobtitle = $_POST['jobtitle'];
$jobtype = $_POST['jobtype'];
$language = $_POST['language'];


$sql = "INSERT INTO add_job( country,language,company_name,job_title,advertise_location, job_type,contract,job_pay,job_description,status) 
	VALUES ('$country','$language','$company_name','$jobtitle','$jobadvertise','$jobtype','$contract','$salary','$description','Active')";

if (mysqli_query($conn, $sql)) {

    $_SESSION['status_title'] = "New Job Added.";
    $_SESSION['status_text'] = "New Job Added.";
    $_SESSION['status_code'] = 'Success';
    header("location:viewapplication.php");
} else {

    $_SESSION['status_title'] = "New Job Not Added.";
    $_SESSION['status_text'] = "New Job Not Added.";
    $_SESSION['status_code'] = 'Warning';
    header("location:viewapplication.php");
}
