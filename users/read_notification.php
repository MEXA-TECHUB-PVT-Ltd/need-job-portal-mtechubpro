<?php
// file include
include_once("../include/db.php");
// object
$user_id = $_SESSION['id'];
# code...
$query = "SELECT * FROM notification";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {


    $query = "DELETE FROM notification WHERE user_id =" . $user_id;
    $upload = mysqli_query($connection, $query);
}

$row2 = array(
    "status" => true
);
