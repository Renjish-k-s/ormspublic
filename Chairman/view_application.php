<?php 
?>
<?php include './Partials_out/header.php'; ?>



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
$sql="SELECT * FROM extension_application as exapp,application_table as app_tab WHERE exapp.app_id=app_tab.id";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
?>
<div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container">
        <h2 class="text-center">Extension Application</h2>
        <form id="myform" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="appid">Application ID</label>
            <input type="text" class="form-control" id="appid" placeholder="Enter Application ID*" name="appid" value="<?php echo $row['applicant_id_ec'].'/'.$row['applicant_id_ec_co']; ?>" required>
          </div>
          <div class="form-group">
            <label for="duration">Duration needed</label>
            <input type="text" class="form-control" id="duration" placeholder="Enter Duration*" name="duration" value="<?php echo $row['duration'] ?>" required>
          </div>
          <div class="form-group">
            <label for="description">Describe the reason for extesion</label>
            <textarea class="form-control" id="" cols="40" rows="10" name="description"><?php echo $row['description'] ?></textarea>
            </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



