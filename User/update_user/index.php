<?php 
session_start();
?>
<?php include '../Partials/header.php'; 


$encodedFileName = urlencode($user['photo_path']);

?>

<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<br>
<link href="./style.css" rel="stylesheet">

<form id="profileForm" method="post" enctype="multipart/form-data">
  <div class="content">
    <div class="login-container d-flex justify-content-center align-items-center min-vh-50" style="margin-top: 0rem;">
      <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 100%; width: 1000px;">
        <h1 class="text-center mb-4">User Profile</h1>
        
        <div class="d-flex justify-content-center align-items-center flex-column">
    <div class="photo-upload text-center">
        <div class="photo-preview" onclick="document.getElementById('profilePhoto').click()">
        <img id="photoPreview" src="../../../image.php?img=<?= urlencode($encodedFileName) ?>" alt="Profile Preview">
        </div> 
        <input type="file" name="profile_photo" id="profilePhoto" style="display: none;" accept="image/*">
        <small class="text-muted mt-2">Click to upload your profile photo</small>
    </div>
</div>
       

 


        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nameInput">Full Name*</label>
              <input type="text" class="form-control" pattern="^[A-Za-z\s]+$" title="Only alphabets and spaces are allowed" id="nameInput" placeholder="Dr./Mr./M." name="fullname" value="<?php echo $user['holder_name'];?>" required>
            </div>
          </div>
          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

          <div class="col-md-4">
            <div class="form-group">
              <label for="City">City*</label>
              <input type="text" class="form-control" id="City" placeholder="Enter the city name" name="City" required>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="Mobile">Mobile number*</label>
              <input type="number" class="form-control" id="Mobile" name="Mobile" placeholder="Enter your mobile number" 
       pattern="^\d{10}$" title="Please enter a valid 10-digit mobile number without spaces" required>

            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="Sex">Sex*</label>
              <select name="sex" id="Sex" class="form-control" required>
                <option value="" disabled selected>Select any</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="address">Enter the address*</label>
              <textarea class="form-control" id="address" pattern="^[A-Za-z0-9\s,.\-\/]+$" title="Only letters, numbers, spaces, commas, dots, hyphens, and slashes are allowed"
              placeholder="Enter the full address" name="address" ></textarea>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="a_email">Alternate Email*</label>
              <input type="email" class="form-control" id="a_email" placeholder="Enter the email" name="a_email" >
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="qualification">Highest Qualification*</label>
              <select name="qualification" id="qualification" class="form-control">
                <option value="" disabled selected>Select any</option>
                <option value="Doctorate">Doctorate</option>
                <option value="MPhil">MPhil</option>
                <option value="Post Graduate">Post Graduate</option>
                <option value="Graduate">Graduate</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="gcp_status">Do you have a GCP certificate?</label>
              <select name="gcp_status" id="gcp_status" class="form-control">
                <option value="">Select any</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
          </div>

          <div class="col-md-4" id="gcp_display" style="display:none">
            <div class="form-group">
              <label for="gcp_upload">Upload the GCP certificate</label>
              <input type="file" class="form-control" id="gcp_upload" name="gcp_upload" accept="application/pdf" >
            </div>
          </div>

          <div class="col-md-4" >
            <div class="form-group">
              <label for="resume">Upload the resume</label>
              <input type="file" class="form-control" id="resume" name="resume" accept="application/pdf" >
            </div>
          </div>

          <div class="col-md-4" >
            <div class="form-group">
              <label for="signature">Upload the scanned signature <i title="signature should be in jpeg,jpg or png format only and should be less than 500kb">ℹ️</i></label>
              <input type="file" class="form-control" id="signature" name="signature" accept=".jpeg, .jpg, .jpg">
            </div>
          </div>

          <div class="col-md-4" >
            <div class="form-group">
              <label for="n_password">New password*</label>
              <input type="text" class="form-control" id="n_password" name="n_password" placeholder="Enter password" required>
            </div>
          </div>

          <div class="col-md-4" >
            <div class="form-group">
              <label for="o_password">Confirm password*</label>
              <input type="password" class="form-control" id="o_password" name="o_password" placeholder="confirm password" required>
            </div>
          </div>


         
        </div>

        <?php// if($user['holder_name']=='0')  {?>
        <div class="row">
            <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary " name="update_user">Submit</button>
            <button type="reset" class="btn btn-secondary ">Reset</button>

            </div>
          <?php// }?>
        </div>
        
      </div>
    </div>
  </div>
</form>

<style>

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function(){
    $('#profileForm').on('submit', function(event){
        event.preventDefault(); // Prevent default form submission

        var formdata = new FormData(this); // Create FormData object

        $.ajax({
            url: './db.php', // PHP file to handle upload
            type: 'POST',
            data: formdata,
            contentType: false, // Important: Prevent jQuery from setting content type
            processData: false, // Important: Prevent jQuery from processing data
            dataType: 'json',   // Parse response as JSON
            success: function(response) {
                var message = response.message;
                if (message === '1') {

                  alertcustom("Record updated successfully. Please Relogin!", 1);
                 setTimeout(function() {
                     window.location.href = "../../";
                 }, 3000);

                } else {
                  alertcustom(message, 2);
                    //alert("Error: " + message);  // Show error message if not '1'
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('There was an error submitting the form.');
            }
        });
    });
});
</script>


<script >



document.addEventListener("DOMContentLoaded", function () {
    const gcp_status = document.getElementById("gcp_status");
    const gcp_display = document.getElementById("gcp_display");
    const profilePhoto = document.getElementById("profilePhoto");
    const photoPreview = document.getElementById("photoPreview");

    gcp_status.addEventListener("change", function () {
        gcp_display.style.display = (this.value === "yes") ? "block" : "none";
    });

    profilePhoto.addEventListener("change", function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            photoPreview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });   
});




</script>

<script src="./alert.js"></script>
<?php //include './db.php'; ?>


<?php include '../Partials/footer.php'; ?>
