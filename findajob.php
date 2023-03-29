<!doctype html>
<html lang="en">
<?php include('include/db.php'); ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('include/scripts.php');
    ?>
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


                <div class="row">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-3">
                                <input name="jobtitile" type="text" class="form-control ps-5 radius-30" placeholder="Search Job Title"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>

                            </div>
                            <div class="col-3">
                                <input name="advertise_location" type="text" class="form-control ps-2 radius-30" placeholder="Search Job Place"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>

                            </div>
                            <div class="col-3">
                                <button name="findjob" type="submit" class="form-control ps-2 pt-1 radius-30 btn btn-blue "><i class="bx bx-search"> Find Job</i></button>

                            </div>
                        </div>

                    </form>
                </div>
                <hr class="m-5" />
                <?php if (isset($_POST['findjob'])) {
                    $jobtitle = $_POST['jobtitile'];
                    $advertise_location = $_POST['advertise_location'];
                    if (($advertise_location)) {
                        $sql = "SELECT * from add_job where advertise_location='$advertise_location'";
                    } else if (isset($jobtitle)) {
                        $sql = "SELECT * from add_job where job_title='$jobtitle' ";
                    } else if (isset($jobtitle) && isset($advertise_location)) {
                        echo  $sql = "SELECT * from add_job where job_title='$jobtitle' AND advertise_location='$advertise_location' ";
                    }
                } else {
                    $sql = "SELECT * from add_job";
                }
                $MYQUERY = mysqli_query($conn, $sql);
                if (mysqli_num_rows($MYQUERY) > 0) {
                ?>

                    <div class="container">
                        <!--end row-->

                        <div class="row ">
                            <?php while ($row = mysqli_fetch_assoc($MYQUERY)) { ?>
                                <div class="col-md-4">
                                    <div class="card  text-white radius-30 border border-warning">
                                        <div class="card-body">
                                            <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i><?php echo $row['job_title']; ?></div>

                                            <h5 class="card-title text-dark text-bold"> <?php echo $row['company_name']; ?></h5>
                                            <h5 class="card-title text-dark"><?php echo $row['advertise_location']; ?></h5>

                                            <p class="badge rounded-pill bg-secondary "> Job Type :<?php echo $row['job_type']; ?></p>
                                            <div class="d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded">
                                                <div class="font-22 text-primary"> <i class="fadeIn animated bx bx-money"></i>
                                                </div>
                                                <div class="ms-2 text-dark"> Salary <?php echo $row['job_pay']; ?></div>
                                            </div>
                                            <p class="badge rounded-pill bg-secondary mt-3"> Country :<?php echo $row['country']; ?></p>

                                        </div>

                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                        <!--end row-->




                    </div>
                <?php
                } else { ?>
                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">
                        <div class="col">
                            <div class="card  text-white radius-30 border border-warning">
                                <div class="card-body">
                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle align-middle me-1"></i><?php ?></div>

                                    <h5 class="card-title text-dark text-bold"> No Job Search Matches</h5>


                                </div>

                            </div>
                        </div>


                    </div>
                <?php   }

                ?>


            </div>
        </div>


        <!--end page wrapper -->
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
<script>

</script>
<script>

</script>


</html>