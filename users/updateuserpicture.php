<?php

include('../include/db.php');
?>
        <?php
        session_start();
        $id = $_SESSION['id'];
        if (isset($_POST['Update'])) {
            $sql = "Select image from users  where id='$id'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                if (mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $imageold = $row['image'];
                    }
                }
            }

            $image = $_FILES['image']['name'];



            $file_name = $_FILES['image']['name'];

            $file = explode('.', $file_name);
            $end = end($file);
            $allowed_ext = array('JPG', 'jpg', 'JPEG', 'jpeg', 'PNG', 'png', 'svg');
            if (in_array($end, $allowed_ext)) {

                $file_tmp = $_FILES['image']['tmp_name'];


                $updatefilename = $_FILES['image']['name'];
                $IMG = "assets/profileImage/" . $updatefilename;
                $sql = "UPDATE users SET image='$IMG' where id = '" . $id . "'";


                $query = mysqli_query($conn, $sql);
                if ($query) {
                    if ($_FILES['image']['name'] != '') {
                        move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/profileImage/" . $_FILES['image']['name']);
                        unlink($imageold);
                        $_SESSION['status_text'] = "Image Updated Successfully ";
                        $_SESSION['status_title'] = "success";
                        $_SESSION['status_code'] = "success";
                        header("location:../profile.php");
                    }
                }
            } else {
                $_SESSION['status_text'] = "Image must be of jpg, svg or png ";
                $_SESSION['status_title'] = "warning";
                $_SESSION['status_code'] = "warning";
                header("location:../profile.php");
            }


            //updating
        }

        ?>
