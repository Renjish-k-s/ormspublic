<?php 
include './Partials/header.php';?>



  <style>
    body{
      background-color: #f7f7f7;
    }
    .container {
      background-color: white; /* Light gray background */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      max-width: 500px; /* Decreased width */
    }
    .btn-sm {
      padding: 5px 10px;
      font-size: 0.875rem; /* Smaller button size */
    }
  </style>

<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
        <h2 class="text-center">Change password</h2>
        <form id="myform" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="old_pass">Enter current Password</label>
            <input type="text" class="form-control" id="old_pass" placeholder="Enter current password*" name="old_pass" required>
          </div>
          <div class="form-group">
            <label for="new_pass">Enter New Password</label>
            <input type="text" class="form-control" id="new_pass" placeholder="Enter old password*" name="new_pass" required   pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}"
            title="Password must be at least 8 characters long, and include uppercase, lowercase, number, and special character.">
          </div>

          <div class="form-group">
            <label for="con_pass">Enter Confirm Password</label>
            <input type="password" class="form-control" id="con_pass" placeholder="Enter new password*" name="con_pass" required>
          </div>
        
          <div class="form-row">
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm btn-block" name="changepassword">Submit</button>
            </div>
            <div class="col-md-6">
              <button type="reset" class="btn btn-secondary btn-sm btn-block">Reset</button>
            </div>
          </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php

if (isset($_POST['changepassword'])) {

  $curr_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $con_pass = $_POST['con_pass'];
  $userid = $_SESSION['user_id'];

  // Fetch current password from DB
  $sql = "SELECT password FROM user_table_global WHERE id = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("i", $userid);
  $stmt->execute();
  $stmt->bind_result($db_pass);
  $stmt->fetch();
  $stmt->close();

  // Check if current password matches
  if (password_verify($curr_pass, $db_pass)) {

      // Check if new password matches confirm password
      if ($new_pass === $con_pass) {

          // Hash the new password
          $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);

          // Update the password in the DB
          $update = "UPDATE user_table_global SET password = ? WHERE id = ?";
          $stmt2 = $con->prepare($update);
          $stmt2->bind_param("si", $hashed_pass, $userid);

          if ($stmt2->execute()) {
              echo "<script>alert('Password changed successfully!');</script>";
          } else {
              echo "<script>alert('Error updating password.');</script>";
          }

          $stmt2->close();

      } else {
          echo "<script>alert('New password and confirm password do not match.');</script>";
      }

  } else {
      echo "<script>alert('Old password is incorrect.');</script>";
  }
}
?>

