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
<?php
$id=$_GET['id'];
$sql_data="SELECT * FROM `commitee_table` WHERE id='$id'";
$res_data=mysqli_query($con,$sql_data);
$row_data=mysqli_fetch_array($res_data);

?>
<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
        <h2 class="text-center">Edit Shedule</h2>
        <form id="myform" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="form-group">
            <label for="fullName">Date of commitee</label>
            <?php $today = date('Y-m-d'); ?>
            <input type="date" class="form-control" id="date_shedule" name="date_shedule" value="<?php echo $row_data['date_meet']; ?>" min="<?php echo $today; ?>" required>

          </div>
       

          <!-- <div class="form-group">
            <label for="username">Review Type</label>
          <select name="revtype" id="" class="form-control">
            <option value="">Select Review Type</option>
            <option value="0">Scientific commitee</option>
            <option value="1">Ethics commitee</option>

          </select> 
          </div> -->

         

        
          <div class="form-row">
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm btn-block" name="create_commitee">Edit</button>
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


  $id=$_GET['id'];
  // Get form data
  $date = $_POST['date_shedule'];  // Format: YYYY-MM-DD


  // Insert into the table
  $sql_insert = "UPDATE `commitee_table` SET `date_meet`='$date' WHERE id='$id'";

  if (mysqli_query($con, $sql_insert)) {
    
    echo "<script>alert('Date updated')</script>";
   // header("Location: ./ec_shedules.php");
  } else {
      echo "Error: " . mysqli_error($con);
  }
}





?>
<script></script>

