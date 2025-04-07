<?php 
session_start();
include '../Partials_in/header.php';?>
<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>


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
        <h2 class="text-center">Commitee Sheduler</h2>
        <form id="myform" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="form-group">
            <label for="fullName">Date of commitee</label>
            <?php $today = date('Y-m-d'); ?>
            <input type="date" class="form-control" id="date_shedule" name="date_shedule" min="<?php echo $today; ?>" required>

          </div>
       

          <div class="form-group">
            <label for="username">Review Type</label>
          <select name="revtype" id="" class="form-control">
            <option value="">Select Review Type</option>
            <option value="0">Scientific commitee</option>
            <option value="1">Ethics commitee</option>

          </select> 
          </div>

         

        
          <div class="form-row">
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm btn-block" name="create_commitee">Submit</button>
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

if (isset($_POST['create_commitee'])) {

  // Get form data
  $date = $_POST['date_shedule'];  // Format: YYYY-MM-DD
  $revtype = $_POST['revtype'];

  // Extract year and month abbreviation
  $year = date('Y', strtotime($date));
  $mon = date('m', strtotime($date));

  // Count existing records for the same year and type
  $sql = "SELECT * FROM `commitee_table` WHERE year = '$year' AND type = '$revtype'";
  $res = mysqli_query($con, $sql);
  $num_row = mysqli_num_rows($res);
  $serial_number = sprintf('%02d', $num_row + 1);

  // Generate committee ID
  if ($revtype == 1) {
    $commitee_num = "IEC/MBDC/" . $serial_number . "/" . $mon . "/" . $year;
  } else {
    $commitee_num = "ISC/MBDC/" . $serial_number . "/" . $mon . "/" . $year;
  }

  // Insert into the table
  $sql_insert = "INSERT INTO `commitee_table` (`commitee_id`, `year`, `type`, `date_meet`, `status`) 
                 VALUES ('$commitee_num', '$year', '$revtype', '$date', '0')";

  if (mysqli_query($con, $sql_insert)) {
    
    echo "<script>alert('inserted')</script>";
      // header("Location: success.php");
  } else {
      echo "Error: " . mysqli_error($con);
  }
}





?>
<script></script>

