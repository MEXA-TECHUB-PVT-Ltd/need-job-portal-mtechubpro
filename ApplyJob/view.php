<?php
include('../include/db.php');

if (isset($_POST['id'])) {

    $output = '';

    $query = "SELECT * FROM add_job WHERE id= '" . $_POST["id"] . "'";

    $result = mysqli_query($conn, $query);

    $output .= '
    <div class="col-12 text-left">';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <form action="" id="form" method="POST"
        enctype="multipart/form-data" class="text-start">
        <div class="mb-3">
            <label for="name" class="form-label">  Job Title</label>
            <input type="text" required name="job_title" value="' . $row['job_title'] . '" class="form-control" readonly>
        </div>
        <div class="mb-3">
        <label for="name" class="form-label">  Date</label>
        <input type="text" required name="job_title" value="' . $row['date'] . '" class="form-control" readonly>
    </div>
    <div class="mb-3">
    <label for="name" class="form-label">  Experience</label>
    <input type="text" required name="job_title" value="' . $row['experience_needed'] . '" class="form-control" readonly>
</div>
<div class="mb-3">
<label for="name" class="form-label">  Job Description</label>
<input type="text" required name="job_title" value="' . $row['job_description'] . '" class="form-control" readonly>
</div>
<div class="mb-3">
<label for="name" class="form-label">  Salary Range</label>
<input type="text" required name="job_title" value="' . $row['salary_range'] . '" class="form-control" readonly>
</div>
<div class="mb-3">
<label for="name" class="form-label"> Job Type</label>
<input type="text" required name="job_title" value="' . $row['job_type'] . '" class="form-control" readonly>
</div>
<div class="mb-3">
<label for="name" class="form-label"> Job Description</label>
<input type="text" required name="job_title" value="' . $row['job_description'] . '" class="form-control" readonly>
</div>
       <div class="mt-4 row">
            <div
                class=" mt-md-0 mt-3 mb-4 text-center ">
               <div class="d-grid">
               
            </div>
            </div>
            </div>
        </div>
    </form>
        ';
    }
    $output .= "</div>";
    echo $output;
}
