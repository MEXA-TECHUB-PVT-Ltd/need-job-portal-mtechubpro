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

                <div class="error-404 d-flex align-items-center justify-content-center">
                    <div class="container">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-xl-5">
                                    <div class="card-body p-4 mt-5">

                                        <h1 class="display-5 mt-5"><span class="text-warning">MEXA</span><span class="text-danger">TECHUB</span><span class="text-primary">LLC</span></h1>

                                        <p>


                                            We Are A Mobile Software Firm That Designs, Develops, And Deploys Custom Solutions For Big Brands And Startups That Want To Make An Impact Through Technology.
                                        </p>

                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <section class="section bg-light">
                                        <div class="container">
                                            <div class="row" id="counter">

                                                <div class="col-12">
                                                    <div class="text-center my-3">
                                                        <div class="counter-content">
                                                            <h2><span class="counter_value" data-target="500">1000</span>+</h2>
                                                            <p class="counter-name text-muted mb-0 text-uppercase">Happy Clients</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="text-center my-3">
                                                        <div class="counter-content">
                                                            <h2><span class="counter_value" data-target="200">500</span>+</h2>
                                                            <p class="counter-name text-muted mb-0 text-uppercase">Successful Projects Delivered</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="text-center my-3">
                                                        <div class="counter-content">
                                                            <h2><span class="counter_value" data-target="12000">9</span>+</h2>
                                                            <p class="counter-name text-muted mb-0 text-uppercase">Hours of Work</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <div class="text-center fw-bold">
                    Reviews
                </div>
                <div class="container" style="margin-top:-150px;">
                    <div class="row">
                        <?php for ($i = 0; $i <= 6; $i++) { ?>
                            <div class="col-md-3">
                                <div class="card radius-15">
                                    <div clas="card-body text-center">
                                        <div class="p-4 border radius-15">

                                            <img src="assets/images/avatars/avatar-1.png" width="110" height="110" class="rounded-circle shadow" alt="">
                                            <h5 class="mb-0 mt-5 text-capitalize">Fatima Gull</h5>
                                            <div class="text-justify">
                                                Prevent long strings of text from breaking your components' layout by using .text-break to set word-wrap: break-word and word-break: break-word. We use word-wrap instead of the more common overflow-wrap for wider browser support, and add the deprecated word-break: break-word to avoid issues with flex containers.

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>




            </div>
        </div>


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