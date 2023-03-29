<!doctype html>
<html lang="en">
<?php include('include/db.php'); ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('include/scripts.php');
    ?>
    <?php include('include/header.php');
    ?>
    <?php include('include/sidebar.php');
    ?>
    <style>

    </style>
</head>
<?php $jobid = $_GET['job_id']; ?>
<?php $user_id = $_GET['user_id'];

$sqlfina = "SELECT * from interview_scheduled where user_id= $user_id AND job_id= $jobid";
$FINALQUERY = mysqli_query($conn, $sqlfina);
if (mysqli_num_rows($FINALQUERY) > 0) {
    $count = "1"; ?>

    <div style="width:200px;" class="email-sidebar-header bg-yellow d-grid"> <a class="btn btn-sm compose-mail-btn"><i class='feather feather-check me-2'></i> Already Email Sent</a>
    </div>

<?php } else {
    $count = "0";
?>
    <div style="width:200px;" class="email-sidebar-header bg-yellow d-grid"> <a onClick="reply_click(<?php echo $row['user_id']; ?>,<?php echo $row['job_id']; ?>)" id="conductinterview" href="javascript:;" class="btn btn-sm compose-mail-btn"><i class='bx bx-plus me-2'></i> Conduct Interview</a>
    </div>
<?php } ?>

<body>
    <!--wrapper-->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">View Application</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">

                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-2">
                <div class="col">

                    <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                    <i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Basic Information</h5>
                            </div>
                            <hr />
                            <?php $sql = "SELECT * FROM apply_job
                              INNER JOIN add_job ON apply_job.job_id =add_job.id where job_id='$jobid' AND user_id='$user_id'";
                            $myquery = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($myquery)) { ?>
                                <form class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Job Title</label>
                                        <input readonly type="text" value="<?php echo $row['job_title']; ?>" class=" form-control" id="inputFirstName" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Advertise Location</label>
                                        <input readonly type="text" value="<?php echo $row['advertise_location']; ?>" class=" form-control" id="inputFirstName" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Job Type</label>
                                        <input readonly type="text" value="<?php echo $row['job_type']; ?>" class=" form-control" id="inputFirstName" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Contract</label>
                                        <input readonly type="text" value="<?php echo $row['contract']; ?>" class=" form-control" id="inputFirstName" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Job Pay</label>
                                        <input readonly type="text" value="<?php echo $row['job_pay']; ?>" class=" form-control" id="inputFirstName" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Candidate Name</label>
                                        <input readonly type="text" value="<?php echo $row['candidate_name']; ?>" class=" form-control" id="inputFirstName" />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Qualification</label>
                                        <input readonly type="text" value="<?php echo $row['qualification']; ?>" class="form-control" id="inputEmail" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Interview Timmings</label>
                                        <input readonly type="text" value="<?php echo $row['interview_timmings']; ?>" class="form-control" id="inputPassword" />
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Job Relocation</label>
                                        <input readonly class="form-control" value="<?php echo $row['jobrelocation']; ?>" rows="3" />
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Experience</label>
                                        <input readonly class="form-control" value="<?php echo $row['experience']; ?>" rows="3" />
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>

                <div class="col">

                    <hr />
                    <div class="card border-top border-0 border-4 border-danger">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div>
                                    <i class="bx bxs-user me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Contact Information</h5>
                            </div>
                            <hr />
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputLastName1" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="lni lni-mic"></i></span>
                                        <input readonly type="text" class="form-control border-start-0" id="inputLastName1" value="<?php echo $row['phone']; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName2" class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                        <input readonly type="text" value="<?php echo $row['email_address']; ?> " class="form-control border-start-0" id="inputLastName2" placeholder="Last Name" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputPhoneNo" class="form-label">Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"><i class="lni lni-map-marker"></i></i></span>
                                        <input readonly value="<?php echo $row['address']; ?>" type="text" class="form-control border-start-0" id="inputPhoneNo" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <?php if ($_SESSION['role'] == "A") {

                                        if ($count == "1") { ?>
                                            <div style="width:200px;" class="email-sidebar-header bg-yellow d-grid"> <a class="btn btn-sm "><i class='feather feather-check me-2'></i> Already Email Sent for Interview</a>
                                            </div>
                                        <?php       } else { ?>

                                            <div style="width:200px;" class="email-sidebar-header bg-yellow d-grid"> <a onClick="reply_click(<?php echo $row['user_id']; ?>,<?php echo $row['job_id']; ?>)" id="conductinterview" href="javascript:;" class="btn btn-sm compose-mail-btn"><i class='bx bx-plus me-2'></i> Conduct Interview</a>
                                            </div>

                                        <?php }
                                    } else {
                                        if ($count == "1") { ?>
                                            <div style="width:200px;" class="email-sidebar-header bg-yellow d-grid"> <a class="btn btn-md "><i class='feather feather-check me-2'></i> Check Your Email The Employer has Responded on You Application</a>
                                            </div>
                                        <?php       } else { ?>

                                            <div style="width:200px;" class="email-sidebar-header bg-yellow d-grid"> <a class="btn btn-md"><i class='me-2'></i> Wait Your Application is Under Consideration </a>
                                            </div>
                                    <?php
                                        }
                                    }



                                    ?>


                                </div>



                            </form>
                        <?php

                            } ?>
                        </div>
                    </div>
                </div>


            </div>
            <!--end row-->
            <div class="compose-mail-popup">
                <div class="card">
                    <div class="card-header bg-dark text-white py-2 cursor-pointer">
                        <div class="d-flex align-items-center">
                            <div class="compose-mail-tsitle">Message for Conduct Interview</div>
                            <div class="compose-mail-close ms-auto">x</div>
                        </div>
                    </div>
                    <form action="resumeemail.php" method="POST">
                        <div class="card-body" style="margin-bottom:40px;">
                            <div class="email-form">
                                <div class="">
                                    <input type="hidden" id="job_id" name="job_id" Value="" class="form-control mt-3" placeholder="To" />

                                    <input type="hidden" id="chat_uniqId" name="userid" Value="" class="form-control mt-3" placeholder="To" />
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-bold"> To </h5>
                                    <input type="text" name="to" value="" id="to" class="form-control mt-3" placeholder="To" />
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-bold"> From </h5>
                                    <input type="text" name="from" Value="mexatechubllc@gmail.com" class="form-control mt-3" placeholder="fatimagull863@gmail.com" />
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-bold"> Subject </h5>
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" value="Interview Conduction Email From Mtechub " />
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-bold"> Message </h5>
                                    <textarea class="form-control" name="message" placeholder="Message" rows="5" cols="10">You are cordially invited on the Interview</textarea>
                                </div>
                                <div class="mb-0">
                                    <div class="d-flex ">
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button name="send" type="submit" class="btn btn-blue">
                                                    Send
                                                </button>


                                            </div>
                                        </div>
                    </form>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>


    <!--end row-->



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
<script>
    function reply_click(e, e2) {
        console.log(e);
        console.log(e2);

        $('#chat_uniqId').val(e);
        $('#job_id').val(e2);

    }
</script>