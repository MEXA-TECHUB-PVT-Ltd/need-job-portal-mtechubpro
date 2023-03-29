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

                <div class="container">


                    <div class="page-content mt-5 ">

                        <div class="card radius-10">
                            <div class="card-header border-bottom-0 bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="font-weight-bold mb-0">Resumes Jobs</h5>
                                    </div>


                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 col-9">
                                            <div class="position-relative">
                                                <input id="search" type="text" class="form-control py-3 ps-5 radius-30" placeholder="Search By Job " />
                                                <span class="position-absolute top-50 product-show translate-middle-y py-3"><i class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-end">

                                                <div class="text-dark mb-4 col-2" style="margin-top:1px; ">
                                                    <select style=" width:150px; height:50px; border-radius:50px;" class=" form-select" onchange="location = 'index.php?filter='+this.value;">
                                                        <option style=" width:150px; height:50px; border-radius:50px;" value="">See All</option>
                                                        <option style=" width:150px; height:50px; border-radius:50px;" value="AtoZ" <?php
                                                                                                                                    if (isset($_GET['filter']) && $_GET['filter'] == 'AtoZ') {
                                                                                                                                        echo 'selected';
                                                                                                                                    }
                                                                                                                                    ?>>A to Z</option>
                                                        <option style=" width:150px; height:50px; border-radius:50px;" value="ZtoA" <?php
                                                                                                                                    if (isset($_GET['filter']) && $_GET['filter'] == 'ZtoA') {
                                                                                                                                        echo 'selected';
                                                                                                                                    }
                                                                                                                                    ?>>Z to A</option>
                                                        <option style=" width:150px; height:50px; border-radius:50px;" value="NewtoOld" <?php
                                                                                                                                        if (isset($_GET['filter']) && $_GET['filter'] == 'NewtoOld') {
                                                                                                                                            echo 'selected';
                                                                                                                                        }
                                                                                                                                        ?>>New to Old</option>
                                                        <option style=" width:150px; height:50px; border-radius:50px;" value="OldtoNew" <?php
                                                                                                                                        if (isset($_GET['filter']) && $_GET['filter'] == 'OldtoNew') {
                                                                                                                                            echo 'selected';
                                                                                                                                        }
                                                                                                                                        ?>>Old to New</option>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="myModal" class="modal fade" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content " style="background-color:#FFB400;">
                                                    <div class="modal-header border-dark">
                                                        <h5 class="modal-title text-dark">Job View</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body " id="categorymodalbody" style=" overflow:hidden;"></div>

                                                    <div class="modal-footer border-dark">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="container">


                                                <div class="table-responsive ">
                                                    <table id="table" class="table mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Email Address</th>
                                                                <th>Experience</th>
                                                                <th>Qualification</th>

                                                                <th>Resume</th>

                                                                <th>Actions</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (isset($_GET['filter'])) {
                                                                if ($_GET['filter'] == 'AtoZ') {
                                                                    $sql = "SELECT * FROM add_job  ORDER BY job_title ASC";
                                                                }
                                                                if ($_GET['filter'] == 'ZtoA') {
                                                                    $sql = "SELECT * FROM add_job  ORDER BY job_title DESC";
                                                                }
                                                                if ($_GET['filter'] == 'NewtoOld') {
                                                                    $sql = "SELECT * FROM add_job  ORDER BY id ASC";
                                                                }
                                                                if ($_GET['filter'] == 'OldtoNew') {
                                                                    $sql = "SELECT * FROM add_job ORDER BY id DESC";
                                                                }
                                                            } else {
                                                                $sql = "SELECT * FROM  apply_job";
                                                            }
                                                            $SQL = mysqli_query($conn, $sql);
                                                            if (mysqli_num_rows($SQL) > 0) {
                                                                while ($row = mysqli_fetch_assoc($SQL)) {
                                                                    $aadid = $row['id']; ?>
                                                                    <tr>


                                                                        <td><a class="badge bg-blue text-warning p-3"><?php echo $row['email_address']; ?></td>

                                                                        <td><?php echo $row['experience']; ?></td>
                                                                        <td><?php echo $row['qualification']; ?></td>



                                                                        <td>

                                                                            <a target="blank" style="color:#FFB400;" href="<?php echo $row['resume']; ?>" class="text-bold py-1"><i class='lni lni-files me-2 text-option'></i><span>Resume</span></a>



                                                                        </td>
                                                                        <td> <a href="viewapplication.php?user_id=<?php echo $row['user_id']; ?>&job_id=<?php echo $row['job_id']; ?>" class=" rounded pointer me-2"><i class="  bx bxs-show text-blue me-2 " style="font-size:24px;"> </i></a>
                                                                            </span></td>


                                                                    </tr>

                                                            <?php }
                                                            } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end page wrapper -->

                        <div class="compose-mail-popup">
                            <div class="card">
                                <div class="card-header bg-dark text-white py-2 cursor-pointer">
                                    <div class="d-flex align-items-center">
                                        <div class="compose-mail-title">Message for Conduct Interview</div>
                                        <div class="compose-mail-close ms-auto">x</div>
                                    </div>
                                </div>
                                <form action="resumeemail.php" method="POST">
                                    <div class="card-body">
                                        <div class="email-form">
                                            <div class="">

                                                <input type="hidden" id="chat_uniqId" name="userid" Value="" class="form-control mt-3" placeholder="To" />
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="text-bold"> To </h5>
                                                <input type="text" name="to" Value="" class="form-control mt-3" placeholder="To" />
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
                                                <textarea class="form-control" name="message" placeholder="Message" rows="10" cols="10">You are cordially invited on the Interview</textarea>
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

                        <!--start overlay-->



                        <div class="search-overlay"></div>
                        <div class="overlay toggle-icon"></div>
                        <!--end overlay-->
                        <!--Start Back To Top Button-->
                        <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
                        <!--End Back To Top Button-->

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