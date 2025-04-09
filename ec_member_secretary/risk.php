<?php 
// session_start();
include './Partials_out/header.php';

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
        <h2 class="text-center">Next Move</h2>
        <form id="myform" method="POST" enctype="multipart/form-data">

        <!-- <div class="form-group">
            <label for="fullName">Date of commitee</label>
            <?php $today = date('Y-m-d'); ?>
            <input type="date" class="form-control" id="date_shedule" name="date_shedule" min="<?php echo $today; ?>" required>

          </div> -->
       

          <div class="form-group">
            <label for="username">Review Type</label>
          <select name="revtype" id="" class="form-control">
            <option value="">Select Review Type</option>
            <option value="6">Continous Review</option>
            <option value="9">Final review</option>

          </select> 
          </div>

         

        
          <div class="form-row">
            <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm btn-block" name="create_commitee">Fix</button>
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
    $revtype = $_POST['revtype'];
  
  
    // Insert into the table
    $sql_insert = "UPDATE `application_table` SET `status`='$revtype' WHERE id='$id'";
  
    if (mysqli_query($con, $sql_insert)) {
      
      echo "<script>alert('Next Move updated successfully')</script>";
     // header("Location: ./ec_shedules.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
  }



?>
<script></script>

