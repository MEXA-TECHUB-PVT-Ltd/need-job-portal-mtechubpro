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
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">User Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">

                                            <?php
                                            $id = $_SESSION['id'];
                                            $sql = "SELECT * from users where id='$id'";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                $profile_image = $row['image']; ?>
                                                <div class="profile-avatar text-center">
                                                    <?php
                                                    if ($profile_image == '') {
                                                        echo '<div class="icon-badge  bg-info text-white">' . strtoupper(substr($row['first_name'], 0, 1)) . '</div>';
                                                    } else {
                                                        echo '<img src="' . $profile_image . '"class="rounded-circle shadow" width="150" height="150" alt="">';
                                                    } ?>

                                                </div>
                                                <div class="mt-3">
                                                    <h4><?php echo $row['first_name'] . '  ' . $row['last_name']; ?></h4>
                                                    <p class="text-secondary mb-1"><?php echo $row['designation']; ?></p>
                                                    <p class="text-muted font-size-sm"> <?php $row['address']; ?></p>
                                                    <button class="btn btn-primary" onClick="editimg(<?php echo $id; ?>)"> Update Profile </button>

                                                </div>
                                        </div>
                                        <hr class="my-4" />

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <form action="users/edituserprofile.php" method="POST">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">First Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span> <input type="text" class="form-control" name="first_name" value=" <?php echo $row['first_name']; ?>" />

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Last Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <span> <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" />

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="email" readonly class="form-control" value="<?php echo $row['email']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0"> Qualification</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="qualificiation" class="form-control" value="<?php echo $row['qualificiation']; ?>" />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="phone_no" value="<?php echo $row['phone']; ?> " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Address</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="address" class="form-control" value="<?php echo  $row['address']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">About Me</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="about_me" rows=3 class="form-control" value="<?php echo  $row['about_me']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Designation</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="designation" rows=3 class="form-control" value="<?php echo  $row['designation']; ?>" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input name="update" type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }  ?>
    <!--end page wrapper -->


    </div>
    </div>
    <div class="modal zoomIn " id="editimg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  p-5" id="editimg-content">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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

<script>
    function editimg(id) {
        // alert(id);
        $.ajax({
            url: "users/edituserimage.php",
            method: 'POST',
            data: {
                id: id
            },
            success: function(result) {

                $('#editimg').modal('show');

                $('#editimg-content').html(result);
            }
        });

    }
</script>

</html>