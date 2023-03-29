<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--favicon-->
    <?php

    include('include/scripts.php'); ?>
    <?php include('include/db.php');


    ?>


    <style>
        .bg-purple {
            background-color: #100C7A;
            color: white;
        }

        .bg-purple:hover {
            background-color: #2A62FF;
            color: black;
        }
    </style>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php include('include/sidebar.php'); ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php include('include/header.php'); ?>
        <?php
        if (isset($_POST['updatepass'])) {
            $old = $_POST['old_password'];
            $OLDPASS = md5($old);
            $id = $_SESSION['id'];
            $sql = "Select * from users where password='$OLDPASS' AND id='$id'";

            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) == 1) {
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                if ($new_password == $confirm_password) {

                    $pass = md5($_POST['new_password']);
                    $sql = "Update users SET password='$pass' where id='$id'";

                    $query = mysqli_query($conn, $sql);

                    if ($query) {

                        $_SESSION['status_text'] = "Password Updated";
                        $_SESSION['status_title'] = "Good";
                    }
                } else {

                    $_SESSION['status_title'] = "New Password & Confirm Password Doesnot Match";
                    $_SESSION['status_title'] = "Something Went Wrong";

                    header('location:settings.php');
                }
            } else {
                $_SESSION['status_text'] = "Old Password is Wrong";
                $_SESSION['status_title'] = "Something Went Wrong";
            }
        } ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="container">
            <div class="authentication-reset-password d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-lg-5 border-end">
                                    <form action="" method="POST">
                                        <div class="card-body">
                                            <div class="p-5">
                                                <div class="text-start">
                                                    <img src="assets/images/logo-img.png" width="180" alt=" MTECHUB LOGO">
                                                </div>
                                                <h4 class="mt-5 font-weight-bold">Generate New Password</h4>
                                                <div class="mb-3 mt-5">
                                                    <label class="form-label">Old Password</label>
                                                    <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" />
                                                </div>
                                                <div class="mb-3 mt-5">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control" placeholder="Enter new password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" />
                                                </div>

                                            </div>
                                            <div class="row ">

                                                <div class="col-12">


                                                    <div class="text-center">
                                                        <button name="updatepass" type="submit" class="btn bg-purple">
                                                            Update Password
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-7">
                                    <img src="assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="search-overlay"></div>
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
    <!--End Back To Top Button-->
    <?php include('include/footer.php'); ?>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <?php include('include/footerscripts.php'); ?>
</body>




</html>