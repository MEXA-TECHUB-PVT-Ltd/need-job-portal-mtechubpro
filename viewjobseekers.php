<!doctype html>
<html lang="en">
<?php include('include/db.php'); ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('include/scripts.php');
    ?>
    <style>
        .bg-blue {
            background-color: #2A62FF;
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
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="container">
                    <h6 class="mb-0 text-uppercase text-center mb-4 mt-4">Job Seekers</h6>
                    <div class="card">
                        <div class="row g-0" style="margin-top:20px">

                            <hr />
                            <?php $SQLQUERY = "SELECT distinct user_id,u.first_name,u.last_name,u.address,u.qualificiation,u.email,u.phone,u.image,u.resume from users as u inner join apply_job where  u.id=apply_job.user_id";
                            $MYFINALQUERY = mysqli_query($conn, $SQLQUERY);
                            if (mysqli_num_rows($MYFINALQUERY) > 0) {
                            ?>

                                <div class="row ">
                                    <?php while ($row = mysqli_fetch_assoc($MYFINALQUERY)) {
                                        $my_frst_char = substr($row['first_name'], 0, 1);
                                        $image = $row['image'];

                                    ?>
                                        <div class="col-md-3">
                                            <div class="card radius-15">
                                                <div class="card-body text-center">
                                                    <div class="p-4 border radius-15">
                                                        <?php if ($image == '') { ?>
                                                            <div class="circle text-white text-capitalize bg-blue fs-5" style="margin:auto;   width: 100px;
  height: 100px;
  border-radius: 50%;">

                                                                <div class="mt-4">

                                                                    <?php echo $my_frst_char; ?>
                                                                </div>
                                                            </div>
                                                        <?php    } else { ?>
                                                            <img src="assets/images/avatars/avatar-1.png" width="110" height="110" class="rounded-circle shadow" alt="">
                                                        <?php } ?> <h5 class="mb-0 mt-5"><?php echo $row['first_name'] . '' . $row['last_name'] ?> </h5>
                                                        <p class="mb-3"><?php echo $row['qualificiation']; ?></p>
                                                        <p class="mb-3"><?php echo $row['email']; ?></p>
                                                        <p class="mb-3"><?php echo $row['phone']; ?></p>
                                                        <p class="mb-3"><?php echo $row['address']; ?></p>
                                                        <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0"><i class="bx bxl-facebook"></i></a>
                                                            <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i class="bx bxl-twitter"></i></a>
                                                            <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i class="bx bxl-linkedin"></i></a>
                                                        </div>
                                                        <div class="d-grid"> <a href="<?php $row['resume']; ?>" class="btn btn-outline-blue text-white bx bx-download radius-15 mb-2">Resume </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php }
                            ?>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <!--start overlay-->
                <div class="overlay toggle-icon"></div>
                <!--end overlay-->
                <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
                <!--End Back To Top Button-->
                <?php include('include/footer.php'); ?>
            </div>
            <!--end wrapper-->

            <!-- Bootstrap JS -->
            <?php include('include/footerscripts.php'); ?>
</body>


</html>