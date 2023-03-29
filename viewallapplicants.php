<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/synadmin/demo/vertical/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 07:08:31 GMT -->


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <?php include('include/scripts.php'); ?>
    <?php include('include/db.php'); ?>
    <link rel="stylesheet" href="jquery.steps/demo/css/jquery.steps.css">
    <link href="jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css" />
    <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

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
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">View Applicants</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="container-fluid" id="grad1">
                        <div class="card-body">

                            <div class="container">
                                <?php $jobid = $_GET['jobid']; ?>

                                <div class="table-responsive ">
                                    <table id="table" class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Candidate Name</th>
                                                <th>Email Address</th>

                                                <th>Resume</th>

                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['filter'])) {
                                                if ($_GET['filter'] == 'AtoZ') {
                                                    $sql = "SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where job_id='$jobid'  ORDER BY job_title ASC";
                                                }
                                                if ($_GET['filter'] == 'ZtoA') {
                                                    $sql = "SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where job_id='$jobid'  ORDER BY job_title DESC";
                                                }
                                                if ($_GET['filter'] == 'NewtoOld') {
                                                    $sql = " SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where job_id='$jobid' ORDER BY id ASC";
                                                }
                                                if ($_GET['filter'] == 'OldtoNew') {
                                                    $sql = "SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where job_id='$jobid' ORDER BY id DESC";
                                                }
                                            } else {
                                                $sqlquery = "
                                                SELECT * FROM apply_job
INNER JOIN add_job ON apply_job.job_id =add_job.id where job_id='$jobid'";
                                                $FINALQUERY = mysqli_query($conn, $sqlquery);
                                                if (mysqli_num_rows($FINALQUERY) > 0) {



                                                    while ($row = mysqli_fetch_assoc($FINALQUERY)) {
                                                        $user_id = $row['user_id'];
                                            ?>
                                                        <tr>
                                                            <td>
                                                                <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                                    <i class="bx bxs-circle me-1"></i><?php echo $row['job_title']; ?>
                                                                </div>
                                                            </td>


                                                            <td><?php echo $row['candidate_name']; ?></td>
                                                            <td><?php echo $row['email_address']; ?></td>

                                                            <td><a style="font-size:20px; text-decoration:none;align-item:center;" href="<?php echo $row['resume']; ?>" class="fadeIn animated bx bx-file-blank"></i></td>
                                                            <td>
                                                                <div class="d-flex order-actions">
                                                                    <span class=" rounded pointer me-2"><a href="viewapplication.php?user_id=<?php echo $row['user_id']; ?>&job_id=<?php echo $row['job_id']; ?>" ?><i class="  bx bxs-show text-blue me-2 " style="font-size:24px;"></i> </a>
                                                                    </span>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                    <?php }
                                                } else {
                                                    ?><td colspan="5">
                                                        <div class="text-center"> No Record Found</div>
                                                    </td>

                                            <?php     }
                                            } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>

        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <?php include('include/footer.php'); ?>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="jquery.steps/build/jquery.steps.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script>
        $(document).ready(function() {
            // view  a category

            // edit a category





        });

        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });











        });
    </script>


    <script src="https://cdn.tiny.cloud/1/yo9e1ts5xtf3knyjm2uck5okrzzgtapaef9txyy5qk62bfyp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
        $(window).load(function() {
            $('#forms').css('visibility', 'visible');
        });
    </script>
    <?php include('include/footerscripts.php'); ?>
</body>


<!-- Mirrored from codervent.com/synadmin/demo/vertical/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 07:08:31 GMT -->

</html>