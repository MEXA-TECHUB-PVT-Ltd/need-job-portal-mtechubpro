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
        <form action="update.php" id="form" method="POST"
        enctype="multipart/form-data" class="text-start">
        <div class="mb-3">
        <label for="name" class="form-label">  Country</label>
        <input type="text" required name="job_title" value="' . $row['country'] . '" class="form-control">

    </div>
    <div class="mb-3">
    <label for="name" class="form-label">  Language</label>
    <input type="text" required name="job_title" value="' . $row['language'] . '" class="form-control">

</div>
        <div class="mb-3">
            <label for="name" class="form-label">  Job Title</label>
            <input type="text" required name="job_title" value="' . $row['job_title'] . '" class="form-control">

        </div>
        <div class="mb-3">
        
        <label for="file" class="form-label">Job Type </label>
        <div class="col-12 text-center">
        <input type="text" required name="job_type" value="' . $row['job_type'] . '" class="form-control">
        </div>
       </div>
       <div class="row">
       <div class="col-6">
           <label for="" class="form-label text-dark">Enter Contract Time</label>
           <input class=" form-control" value="' . $row['contract'] . '"type="text" name="contract" id="contract" placeholder="Enter Contract" />

       </div>
       <div class="col-6">
           <label for="" class="form-label text-dark">Enter Contract Period</label>
           <select name="period" id="period" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
               <option selected>Day(s)</option>
               <option value="months(s)">Month(s)</option>
               <option value="Year(s)">Year(s)</option>


           </select>
       </div>

       <div class="col-6">
           <label for="" class="form-label text-dark">Enter Salary Package</label>
           <input class="form-control" value="' . $row['job_pay'] . '"type="text" name="salary" id="salary" placeholder="Enter Salary Package" />

       </div>
       <div class="col-6">
           <label for="" class="form-label text-dark"></label>
           <select name="periodsalary" id="periodsalary" class="form-select form-select-md mb-1" aria-label=".form-select-lg example">
               <option selected>Per Day</option>
               <option value="Per Month">Per Month</option>
               <option value="Per Year">Per Year</option>


           </select>
       </div>

</div>

  </div>
<div class="row">

<label for="" class="form-label text-dark mt-3">Job Description</label>
<textarea required rows="20" id="description" value="' . $row['job_description'] . '" name="description"></textarea>
       
</div>
       <div class="mb-3">
        
       <label for="file" class="form-label mt-3">Job Pay </label>
       <div class="col-12 text-center">
       <input type="text" required name="job_pay" value="' . $row['job_pay'] . '" class="form-control">
       </div>
      </div>
      <div class="mb-3">
      <label for="inputChoosePassword" class="form-label text-dark">Where would you like to Advertise this job?</label>
      <input type="text" required name="jobadvertise" value="' . $row['advertise_location'] . '" class="form-control">
      </div>
      <div class="mb-3">
      <label for="inputChoosePassword" style="color:black;" class="form-label">Choose Job Type</label>
      <select name="jobtype" id="jobtype" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
          <option selected>Internship</option>
          <option value="Fulltime">Full time </option>
          <option value="Partime">Partime</option>

      </select>
      </div>

       <div class="mt-4 row">
            <div class=" mt-md-0 mt-3 mb-4 text-center ">
               <div class="d-grid">
                <button  name="add" type="submit" class="text-white btn"
                    style="background-color:#FD684A">
                    Update
                </button>
            </div>
            </div>
            </div>
        </div>
    </form>
        ';
    }
    $output .= "</div>";
    echo $output;
} ?>
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
<?php include('../include/footerscripts.php'); ?>