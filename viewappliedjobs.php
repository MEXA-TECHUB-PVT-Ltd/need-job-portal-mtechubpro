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
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">View Applied Jobs</div>
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

                <!--end breadcrumb-->
                <div class="row">
                    <div class="container-fluid" id="grad1">
                        <div class="card-body">

                            <div class="container">


                                <div class="table-responsive ">
                                    <table id="table" class="table mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Candidate Name</th>
                                                <th>Experience Needed</th>
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
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where user_id='$id'  ORDER BY job_title ASC";
                                                }
                                                if ($_GET['filter'] == 'ZtoA') {
                                                    $sql = "SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where user_id='$id'  ORDER BY job_title DESC";
                                                }
                                                if ($_GET['filter'] == 'NewtoOld') {
                                                    $sql = " SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where user_id='$id' ORDER BY id ASC";
                                                }
                                                if ($_GET['filter'] == 'OldtoNew') {
                                                    $sql = "SELECT * FROM apply_job
                                                    INNER JOIN add_job ON apply_job.job_id =add_job.id where user_id='$id' ORDER BY id DESC";
                                                }
                                            } else {
                                                $sqlquery = "
                                                SELECT * FROM apply_job as apjob
                                            INNER JOIN add_job as adjob ON apjob.job_id =adjob.id where user_id='$id'";
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
                                                            <td><?php echo $row['experience']; ?></td>
                                                            <td><?php echo $row['email_address']; ?></td>
                                                            <td><a style="font-size:20px; text-decoration:none;align-item:center;" href="<?php echo $row['resume']; ?>" class="fadeIn animated bx bx-file-blank"></i></td>
                                                            <td>
                                                                <div class="d-flex order-actions">
                                                                    <span class=" rounded pointer me-2"><a href="viewapplication.php?user_id=<?php echo $row['user_id']; ?>&job_id=<?php echo $row['job_id']; ?>" ?><i class="  bx bxs-show text-blue me-2 " style="font-size:24px;"></i> </a>
                                                                    </span>

                                                                </div>
                                                            </td>
                                                        </tr> <?php }
                                                        } else { ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="text-center">
                                                                No Record Founds
                                                            </div>
                                                        </td>
                                                    </tr>

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
        <?php include('include/footer.php'); ?>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <?php include('include/footerscripts.php'); ?>
</body>
<script>
    function loadEdit(id) {
        alert('hi');
        console.log(id);
        $.ajax({
            url: "job/editnew.php",
            method: "POST",
            data: {
                id: id
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response);
                $('#job_title').val(response.job_title);
                $('#job_type').val(response.job_type);
                $('#country').val(response.country);
                $('#location').val(response.location);
                $('#company_name').val(response.company_name);
                $('#job_title').val(response.job_title);
                $('#contract').val(response.contract);
                $('#job_type').val(response.job_type);
                $('#job_pay').val(response.job_pay);
                $('#hidden_id').val(response.id);
                // And finally you can this function to show the pop-up/dialog
                $("#myModal_1").modal();
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        // view a category
        $('.ButtonModal').click(function() {
            id = $(this).attr('id')
            $.ajax({
                url: "job/view.php",
                method: 'post',
                data: {
                    id: id
                },
                success: function(result) {
                    // alert(result);
                    $('#myModal').modal("show");
                    $("#categorymodalbody").html(result)
                }
            });



        });

        // edit a category





    });

    $(document).ready(function() {
        // Listen for changes to the search input
        $('#search').on('input', function() {
            // Get the search query
            var query = $(this).val().toLowerCase();

            // Filter the table rows
            $('#table tbody tr').filter(function() {
                return $(this).text().toLowerCase().indexOf(query) === -1;
            }).hide();

            $('#table tbody tr').filter(function() {
                return $(this).text().toLowerCase().indexOf(query) !== -1;
            }).show();
        });
    });
</script>


</html>