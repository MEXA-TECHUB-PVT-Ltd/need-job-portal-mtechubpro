<?php
include('../include/db.php');
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header('location:signin.php');
}


$query = "SELECT * FROM users WHERE id= '" . $_POST["id"] . "'";

$result = mysqli_query($conn, $query);



while ($row = mysqli_fetch_assoc($result)) {


    echo '<form action="users/updateuserpicture.php" enctype="multipart/form-data"  id="form" method="POST"
          enctype="multipart/form-data">
          <div class="mb-3">
       
          <input type="hidden" name="id"  value="' . $row['id'] . '" class="form-control">
        </div>
          <div class="mb-3">
          <label for="fname" class="form-label"> User Image</label>
          <input   required  class="form-control" name="image" alt="User Image" type="file" onchange="readURL(this);" />
          <div class="col-12 mt-2 text-center">
          <img id="blah" src="" style="width:100px;"  />
               </div>
          </div>
   

                     </div>

        
          <div class="mt-4 row">
              <div
                  class=" mt-md-0 mt-3 mb-4 d-flex text-center justify-content-between">
                  
                  <button name="Update" type="submit" class="btn col-12 btn-primary"
                >
                 Update
                  </button>
              </div>
          </div>
      </form>';
}


?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }



    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");
    chooseFile.addEventListener("change", function() {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function() {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img style="width:100px;" src="' + this.result + '" />';
            });
        }
    }
</script>