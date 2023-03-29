<?php
// file include
include('../include/db.php');



if (isset($_POST["id"])) {
    # code...
    $id = $_POST["id"];
    $query = "SELECT * FROM add_job WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_object($result);


    // Important to echo the record in JSON format
    echo json_encode($row);

    // Important to stop further executing the script on AJAX by following line
    exit();
} else {
    echo json_encode("error");
    exit();
}
