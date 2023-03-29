<?php

date_default_timezone_set("Asia/Karachi");
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'jobportal';
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn) {
    echo 'error';
} else {
    // echo 'connected';
}
