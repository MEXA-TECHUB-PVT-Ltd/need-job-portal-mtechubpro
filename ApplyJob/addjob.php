<?php
include('../include/db.php');

echo $id = $_POST['id'];
echo $uniq = uniqid();
die();

if (isset($_POST['submit'])) {

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

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        $sql1 = "Update into add_job SET documents='$dbPath' where id='$id'";

        $query = mysqli_query($conn, $sql1);
        if ($query) {

            header("location:JobInformation3.php?id=<?php echo $id;?>");
        }
    }
}
