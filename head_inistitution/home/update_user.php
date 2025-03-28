<?php include '../Partials/header.php'; ?>

<style>
  label {
    font-size: 0.875rem;
  }
  input, select {
    font-size: 0.875rem;
  }
  .form-control {
    width: 100%;
  }
  .row {
    margin-bottom: 0px; /* Adjust the margin as needed */
  }
</style>

<form action="" method="post" enctype="multipart/form-data">
  <div class="content">
    <div class="login-container d-flex justify-content-center align-items-center min-vh-50" style="margin-top: 0rem;">
      <div class="container bg-white p-3 rounded shadow-sm" style="max-width: 100%; width: 1000px;">
        <h2 class="text-center">MY PROFILE</h2>
        <!-- Name, Institution, and Mobile Section -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="nameInput">Full Name</label>
              <input type="text" class="form-control" id="nameInput" placeholder="Dr./Mr./Mrs." name="fullname" value="<?php echo $row_holdername['holder_name']; ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="inis_name">Institution Name</label>
              <input type="text" class="form-control" id="inis_name" placeholder="Enter your institution name*" name="institution_name" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="mobileInput">Mobile No.</label>
              <input type="text" class="form-control" id="mobileInput" placeholder="Enter your mobile number" name="mobilenumber" required>
            </div>
          </div>
        </div>

        <!-- Role and Landline Section -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="land_line">Landline No.</label>
              <input type="text" class="form-control" id="land_line" name="land_line" placeholder="Enter your landline number">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="short_name">Institution Short form</label>
              <input type="text" class="form-control" id="short_name" name="short_name" placeholder="Enter your Institution Short form">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="photo">Upload Photo</label>
              <input type="file" class="form-control" id="photo" name="photo_path" accept=".jpg,.jpeg,.png" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="alter_email_id">Alternate Email id</label>
              <input type="text" class="form-control" id="alter_email_id" name="alter_email_id" placeholder="Enter your another email id">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="roleInput">Enter new password</label>
              <input type="text" class="form-control" id="passwordInput" name="passwordInput" placeholder="Enter your Institution Short form">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="photo">Repeat password</label>
              <input type="password" class="form-control" id="passwordRepeatInput" name="passwordRepeatInput" placeholder="Enter password again" required>
            </div>
          </div>
        </div>


        <!-- Submit and Reset Buttons -->
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary" style="width: 7rem;" name="update_user">Submit</button>
          <button type="reset" class="btn btn-secondary" style="width: 7rem;">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>



<?php 

// Check if the form is submitted
if (isset($_POST['update_user'])) {
    // Validate passwords match
    if ($_POST['passwordInput'] === $_POST['passwordRepeatInput']) {
        $password = password_hash($_POST['passwordInput'],PASSWORD_DEFAULT);
        $newname = htmlspecialchars($_POST['fullname'], ENT_QUOTES, 'UTF-8');
        $id = $row_holdername['id'];

        $mobile_no = htmlspecialchars($_POST['mobilenumber'], ENT_QUOTES, 'UTF-8');


        $institution_name = htmlspecialchars($_POST['institution_name'], ENT_QUOTES, 'UTF-8');
        $land_line = htmlspecialchars($_POST['land_line'], ENT_QUOTES, 'UTF-8');

        $short_name = htmlspecialchars($_POST['short_name'], ENT_QUOTES, 'UTF-8');


        $alter_email_id = htmlspecialchars($_POST['alter_email_id'], ENT_QUOTES, 'UTF-8');

        $approval_status=0;

        // File upload validation for photo
        if (($_FILES['photo_path']['size'] < 500 * 1024)) { // File size less than 500 KB
            $basepath = uniqid() . '-' .basename($_FILES['photo_path']['name']);
            $photo_path = '../../uploads/2024'.$basepath;

            // Check if GCP Certification is 'Yes'
          

            if (move_uploaded_file($_FILES['photo_path']['tmp_name'], $photo_path)) {
                // Update database
                $sql = "UPDATE `user_table_global` SET `holder_name`='$newname', `password`='$password' WHERE `id`='$id'";
                $sql_details = "UPDATE `institution_details` SET `inistitition_name`='$institution_name',`short_form`='$short_name',`alter_email_id`='$alter_email_id',`Approval_status`='$approval_status',`mobile_number`='$mobile_no',`land_line`='$land_line',`photo_path`='$basepath' WHERE `user_id`='$id'";

                // Execute your update queries here
                mysqli_query($con, $sql);
                mysqli_query($con, $sql_details);

                echo '<script>alert("Profile updated successfully!");</script>';
            } else {
                echo '<script>alert("File upload failed.");</script>';
            }
        } else {
            echo '<script>alert("The file size exceeds the limit of 500 KB.");</script>';
        }
    } else {
        echo '<script>alert("Passwords do not match.");</script>';
    }
}
?>

