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
        <div class="authentication-header"></div>
        <header class="login-header shadow">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo-img.png" width="140" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
            </nav>
        </header>
        <div class="d-flex align-items-center justify-content-center my-5">
            <div class="container   " style="margin-top:150px;">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
                                        <p>Already have an account? <a href="login.php">Sign in here</a>
                                        </p>
                                    </div>

                                    <div class="form-body">
                                        <form action="users/insert.php" enctype="multipart/form-data" method="POST" class="row g-3">
                                            <div class="col-sm-6">
                                                <label for="inputFirstName" class="form-label">First Name</label>
                                                <input name="first_name" required type="text" class="form-control" id="inputFirstName" placeholder="Enter First Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inputLastName" class="form-label">Last Name</label>
                                                <input name="last_name" required type="text" class="form-control" id="inputLastName" placeholder="Enter Last Name">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input required name="password" type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" required name="emailaddess" class="form-control" id="inputEmailAddress" placeholder="Email Address">
                                            </div>


                                            <div class="col-sm-6 mt-2">
                                                <label for="inputChooseImage" class="form-label">Profile Image</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bx bx-images"></i>
                                                    </div>
                                                    <input required type="file" accept="image/*" id="imgInp" name="image" class="form-control  mt-2 ps-5" placeholder="">

                                                </div>
                                                <div class="col-12 mt-2 text-center">
                                                    <img id="blah" src="" class="rounded shadow mb-4" style="width:100px;" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button name="save" type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
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