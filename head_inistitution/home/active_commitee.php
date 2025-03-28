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
  section {
    margin-bottom: 2rem;
  }
</style>
<?php


$sql = "SELECT * FROM commitee_table where status=1";
$res = mysqli_query($con, $sql);
?>


<form action="" method="post" enctype="multipart/form-data">
  <div class="content">
    <div class="login-container d-flex justify-content-center align-items-center min-vh-50" style="margin-top: 0rem;">
      <div class="container bg-white p-3 rounded shadow-sm" style="max-width: 100%; width: 1000px;">
        
        <!-- Section 1: Header -->
        <section>
          <h2 class="text-center">Committee List</h2>
        </section>
        
      
        <!-- Section 3: Table -->
        <section id="continue_chairman">
          <div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="committeeTable">
                <!-- Dynamic rows will be inserted here -->
                <?php $i=0;  while($row = mysqli_fetch_array($res)) { 
                    
                    ?>

                <tr>
                  <td><?php echo ++$i;?></td>
                  <td>IEC/MBDC/<?php echo $row['commitee_id']; ?></td>
                 
                  <td><a class="btn btn-sm btn-primary" href="./">More Details</a></td>
                </tr>
                    <?php

                }

                ?>
                   



             


              </tbody>
            </table>
          </div>
        </section>










        <!-- Section 4: Submit and Reset Buttons -->
       

      </div>
    </div>
  </div>
</form>


