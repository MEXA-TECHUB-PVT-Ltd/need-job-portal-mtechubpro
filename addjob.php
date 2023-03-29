<!doctype html>
<html lang="en">
<?php include('include/db.php'); ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('include/scripts.php');
    ?>
    <link rel="stylesheet" href="jquery.steps/demo/css/jquery.steps.css">
    <link href="jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css" />
    <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        /*Background color*/
        #grad1 {
            background-color: #9C27B0;
            background-image: linear-gradient(#2A62FF, #FFB400, #100C7A);
            min-height: 90vh;
        }

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E;
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;

            font-size: 16px;
            letter-spacing: 1px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;

            border-bottom: 2px solid skyblue;
            outline-width: 0;
        }

        /*Blue Buttons*/
        #msform .action-button {
            width: 100px;
            background: #100C7A;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #FFB400;
        }

        /*Previous Buttons*/
        #msform .action-button-previous {
            width: 100px;
            background: #FFB400;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
        }

        /*Dropdown List Exp Date*/
        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px;
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue;
        }

        /*The background card*/
        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        #progressbar .active {
            color: #000000;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative;
        }

        /*Icons in the ProgressBar*/
        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023";
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007";
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d";
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        /*ProgressBar before any progress*/
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px autop;
            padding: 2px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #FFB400;
        }

        /*Imaged Radio Buttons*/
        .radio-group {
            position: relative;
            margin-bottom: 25px;
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px;
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
        }

        /*Fit image in bootstrap div*/
        .fit-image {
            width: 100%;
            object-fit: cover;
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

                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Add Job Post</div>
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
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <h2><strong>Add Job Post</strong></h2>

                                    <div class="row">
                                        <div class="col-md-12 mx-0">
                                            <form id="msform">
                                                <!-- progressbar -->
                                                <ul id="progressbar">
                                                    <li class="active" id="account"><strong>Basic</strong></li>
                                                    <li id="personal"><strong>Intermediate</strong></li>
                                                    <li id="payment"><strong>Detailed</strong></li>
                                                    <li id="confirm"><strong>Finish</strong></li>
                                                </ul>
                                                <!-- fieldsets -->
                                                <fieldset>
                                                    <div class="form-card">

                                                        <label for="" class="form-label text-dark">Enter Country</label>
                                                        <input required type="country" name="country" id="country" placeholder="Enter Your Country Address" />
                                                        <label for="" class="form-label text-dark">Enter Language</label>
                                                        <input required type="text" name="language" id="language" placeholder="Enter Your Language" />
                                                        <label for="" class="form-label text-dark">Enter Company Name</label>
                                                        <input required type="text" name="companyname" id="company_name" placeholder="Company Name" />



                                                    </div>
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">

                                                        <label for="" class="form-label text-dark">Enter Job Title</label>

                                                        <input required type="text" name="jobtitle" id="jobtitle" placeholder="Job Title" />

                                                        <label for="inputChoosePassword" class="form-label text-dark">Where would you like to Advertise this job?</label>
                                                        <input required type="text" name="jobadvertise" id="jobadvertise" placeholder="Job Advertisment" />
                                                        <label for="inputChoosePassword" style="color:black;" class="form-label">Choose Job Type</label>
                                                        <select required name="jobtype" id="jobtype" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                            <option selected>Internship</option>
                                                            <option value="Fulltime">Full time </option>
                                                            <option value="Partime">Partime</option>

                                                        </select>
                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="" class="form-label text-dark">Enter Contract Time</label>
                                                                <input class="mt-3" type="text" name="contract" id="contract" placeholder="Enter Contract" />

                                                            </div>
                                                            <div class="col-6">

                                                                <select name="period" id="period" class="form-select form-select-lg mt-3" aria-label=".form-select-lg example">
                                                                    <option selected>Day(s)</option>
                                                                    <option value="month(s)">Month(s)</option>
                                                                    <option value="Year(s)">Year(s)</option>


                                                                </select>
                                                            </div>

                                                            <div class="col-6">
                                                                <label for="" class="form-label text-dark">Enter Salary Package</label>
                                                                <input class="mt-3" type="text" name="salary" id="salary" placeholder="Enter Salary Package" />

                                                            </div>
                                                            <div class="col-6">
                                                                <label for="" class="form-label text-dark"></label>
                                                                <select name="periodsalary" id="periodsalary" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                                    <option selected>Per Day</option>
                                                                    <option value="Per Month">Per Month</option>
                                                                    <option value="Per Year">Per Year</option>


                                                                </select>
                                                            </div>


                                                            <textarea required rows="20" id="description" value="" name="description"></textarea>
                                                        </div>


                                                    </div>
                                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                                    <input type="button" id="butsave" name="next" class="next action-button" value="Next Step" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-card">
                                                        <h2 class="fs-title text-center"></h2>
                                                        <br><br>

                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
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
            $('.ButtonModal').click(function() {
                id = $(this).attr('id')
                $.ajax({
                    url: "job/view.php",
                    method: 'post',
                    data: {
                        Id: Id
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
    <script>
        $(document).ready(function() {
            $('#butsave').on('click', function() {
                $("#butsave").attr("disabled", "disabled");
                var jobtype = $('#jobtype').val();
                var jobtitle = $('#jobtitle').val();
                var company_name = $('#company_name').val();

                var country = $('#country').val();

                var contract = $('#contract').val();
                var language = $('#language').val();
                var description = $('#description').val();
                var period = $('#period').val();
                var salary = $('#salary').val();
                var jobadvertise = $('#jobadvertise').val();
                var periodsalary = $('#periodsalary').val();

                console.log(jobtype, jobtitle, company_name, country, contract, language, jobadvertise);

                if (country != "" && company_name != "" && jobtitle != "") {
                    $.ajax({
                        url: "save.php",
                        type: "POST",
                        data: {
                            jobtype: jobtype,
                            period: period,
                            jobtitle: jobtitle,
                            description: description,
                            salary: salary,
                            company_name: company_name,
                            country: country,
                            contract: contract,
                            periodsalary: periodsalary,
                            contract: contract,
                            language: language,
                            jobadvertise: jobadvertise

                        },
                        cache: false,
                        success: function(dataResult) {

                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#butsave").removeAttr("disabled");
                                $('#fupForm').find('input:text').val('');
                                $("#success").show();
                                $('#success').html('New Job Added!');
                            } else if (dataResult.statusCode == 201) {
                                alert("Error occured !");
                            }
                            window.location.href = "index.php";
                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }
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



</html>