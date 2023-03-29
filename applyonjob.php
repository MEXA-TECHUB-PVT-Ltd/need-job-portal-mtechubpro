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
    <?php

    $jobid = $_GET['id'];

    ?>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php include('include/sidebar.php'); ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php include('include/header.php'); ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="container">
            <!-- <div class="container-fluid " style="margin-top:25px;"> -->
            <div class="container ">

                <h3 class="text-center  mb-4" style="margin-top:125px;">Apply For Job</h3>
                <div class="container form-body border border-primary">
                    <h3 class="text-start  mb-4" style="margin-top:125px;">Basic Information</h3>
                    <form action="ApplyJob/add.php" method="POST" enctype="multipart/form-data" class="row g-3">
                        <input type="hidden" name="jobid" class="form-control" value="<?php echo $jobid; ?>">
                        <div class="col-sm-6">
                            <label for="inputFirstName" class="form-label">Do you have experience of 6 months to 1 year or more?</label>
                            <input type="text" name="experience" class="form-control" placeholder="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputLastName" class="form-label">What is the hightest level of Education?</label>
                            <select class="form-select" name="qualification" aria-label="Default select example">

                                <option selected value="matric">Matric</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Bachelors">Bachelors</option>
                                <option value="Masters">Masters</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="inputSelectCountry" class="form-label">Please list down 2,3 dates on which you can do interview?</label>
                            <textarea name="interview_timmings" type="text" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="">


                        </textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputLastName" class="form-label">Will you able be able to relocate to Rawalpindi for this job ? </label>
                            <select class="form-select" name="jobrelocation" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="Yes, I can make commute"> Yes, I can make commute</option>
                                <option value="  Yes, I am planning to relocate"> Yes, I am planning to relocate</option>
                                <option value=" Need Relocation Assistance"> Need Relocation Assistance</option>
                                <option value="  No"> No</option>
                            </select>

                        </div>

                        <div class="row">
                            <div class="col-xl-9 mx-auto">
                                <h6 class="mb-0 text-uppercase mt-5">Upload your Resume</h6>
                                <hr />
                                <div class="card">
                                    <div class="card-body">

                                        <input name="file" required type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!--end row-->


                </br>
                <div class="container border border-primary">


                    <h3 class="text-start  mb-4" style="margin-top:125px;">Contact Information</h3>
                    <?php $sql = "select * from users where id ='$id'";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <div class="col-sm-12">
                            <label for="inputFirstName" class="form-label">Candidate Name</label>
                            <input type="text" name="candidate_name" value="<?php echo $row['first_name'] . '     ' . $row['last_name'] ?>" class="form-control" placeholder="">
                        </div>
                        <div class="col-sm-12">
                            <label for="inputFirstName" class="form-label">Email Address</label>
                            <input type="text" name="email_address" value="<?php echo $row['email']; ?>" class="form-control" placeholder="">
                        </div>

                        <div class="col-sm-12">
                            <label for="inputFirstName" class="form-label">Address</label>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" placeholder="">
                        </div>

                        <div class="col-12">
                            <label for="inputSelectCountry" class="form-label">Phone Number</label>
                            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control mb-3" placeholder="">


                            </textarea>
                        </div>
                        <div class="col-12">
                            <label for="inputSelectCountry" class="form-label">Qualification</label>
                            <input type="text" name="qualificiation" value="<?php echo $row['qualificiation']; ?>" class="form-control mb-3" placeholder="">



                        </div>
                        <div class="text-end">

                            <button type="submit" name="save" class="btn btn-end bg-purple text-darks mb-5">
                                Add Job Request
                            </button>
                        </div>

                </div>
                <!--end row-->
            <?php } ?>

            </br>

            </div>

        </div>

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