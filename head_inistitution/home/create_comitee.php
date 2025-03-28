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
$c_year = date("Y");

$sql = "SELECT * FROM commitee_table WHERE `year` = '$c_year'";
$res = mysqli_query($con, $sql);
$count = mysqli_num_rows($res);
echo $count;

///////////////////////////////////////////////////////

$sql_chairman = "SELECT * FROM user_table_global WHERE usertype = '2' AND status = '1'";
$res_chair = mysqli_query($con, $sql_chairman);

///////////////////////////////////////////////////////

$sql_mem = "SELECT * FROM user_table_global WHERE usertype = '3' AND status = '1'";
$res_mem = mysqli_query($con, $sql_mem);

///////////////////////////////////////////////////////

$sql_rev = "SELECT * FROM user_table_global WHERE usertype = '4' AND status = '1'";
$res_rev = mysqli_query($con, $sql_rev);
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="content">
    <div class="login-container d-flex justify-content-center align-items-center min-vh-50" style="margin-top: 0rem;">
      <div class="container bg-white p-3 rounded shadow-sm" style="max-width: 100%; width: 1000px;">
        
        <!-- Section 1: Header -->
        <section>
          <h2 class="text-center">Create Committee</h2>
        </section>
        
        <!-- Section 2: Committee Details -->
        <section >
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="commiteeId">Committee ID</label>
                <input type="text" class="form-control" id="commiteeId" name="commitee_id" value="IEC/MBDC/<?php echo $count + 1; ?>/<?php echo date('Y')."/02"; ?>" required readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="institutionName">Year</label>
                <input type="text" class="form-control" id="institutionName" name="institution_name" >
              </div>
            </div>
          </div>
        </section>
        
        <!-- Section 3: Table -->
        <section id="continue_chairman">
          <div>
            <h4 class="text-center">Chairman List</h4>
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
                <?php while($row = mysqli_fetch_array($res_chair)) { 
                    
                    $id=$row['id'];
                    ?>

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['holder_name']; ?></td>
                  <?php
                        $id_tab=$count + 1 ."/". date('Y');
                        $sql="select * from commitee_table_detailed where commitee_id='$id_tab' and user_id='$id'";
                        $res=mysqli_query($con,$sql);
                        $c=mysqli_num_rows($res);
                        if($c==0)
                        {
                  ?>
                  <td><a class="btn btn-sm btn-primary" href="commitee_add.php?id=<?php echo $count + 1 ."/". date('Y'); ?>&usertype=<?php echo $row['usertype']; ?>&userid=<?php echo $row['id']; ?>">Add</a></td>
                </tr>
                    <?php  }
                    
                    else{?>
                <td><a class="btn btn-sm btn-primary" href="commitee_sub.php?id=<?php echo $count + 1 ."/". date('Y'); ?>&usertype=<?php echo $row['usertype']; ?>&userid=<?php echo $row['id']; ?>">Remove</a></td>
                </tr>

                    <?php }?>



                <?php } ?>


              </tbody>
            </table>
          </div>
        </section>




        <section id="continue_member">
          <div>
            <h4 class="text-center">Member Secretary List</h4>
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
                <?php while($row = mysqli_fetch_array($res_mem)) { 
                    
                    $id=$row['id'];
                    ?>

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['holder_name']; ?></td>
                  <?php
                        $id_tab=$count + 1 ."/". date('Y');
                        $sql="select * from commitee_table_detailed where commitee_id='$id_tab' and user_id='$id'";
                        $res=mysqli_query($con,$sql);
                        $c=mysqli_num_rows($res);
                        if($c==0)
                        {
                  ?>
                  <td><a class="btn btn-sm btn-primary" href="commitee_add.php?id=<?php echo $count + 1 ."/". date('Y'); ?>&usertype=<?php echo $row['usertype']; ?>&userid=<?php echo $row['id']; ?>">Add</a></td>
                </tr>
                    <?php  }
                    
                    else{?>
                <td><a class="btn btn-sm btn-primary" href="commitee_sub.php?id=<?php echo $count + 1 ."/". date('Y'); ?>&usertype=<?php echo $row['usertype']; ?>&userid=<?php echo $row['id']; ?>">Remove</a></td>
                </tr>

                    <?php }?>



                <?php } ?>


              </tbody>
            </table>
          </div>
        </section>





         <section id="continue_review">
          <div>
            <h4 class="text-center">Reviewer List</h4>
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
                <?php while($row = mysqli_fetch_array($res_rev)) { 
                    
                    $id=$row['id'];
                    ?>

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['holder_name']; ?></td>
                  <?php
                        $id_tab=$count + 1 ."/". date('Y');
                        $sql="select * from commitee_table_detailed where commitee_id='$id_tab' and user_id='$id'";
                        $res=mysqli_query($con,$sql);
                        $c=mysqli_num_rows($res);
                        if($c==0)
                        {
                  ?>
                  <td><a class="btn btn-sm btn-primary" href="commitee_add.php?id=<?php echo $count + 1 ."/". date('Y'); ?>&usertype=<?php echo $row['usertype']; ?>&userid=<?php echo $row['id']; ?>">Add</a></td>
                </tr>
                    <?php  }
                    
                    else{?>
                <td><a class="btn btn-sm btn-primary" href="commitee_sub.php?id=<?php echo $count + 1 ."/". date('Y'); ?>&usertype=<?php echo $row['usertype']; ?>&userid=<?php echo $row['id']; ?>">Remove</a></td>
                </tr>

                    <?php }?>



                <?php } ?>


              </tbody>
            </table>
          </div>
        </section>






        <!-- Section 4: Submit and Reset Buttons -->
        <section>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="width: 7rem;" name="create_commitee">Submit</button>
            <button type="reset" class="btn btn-secondary" style="width: 7rem;">Reset</button>
          </div>
        </section>

      </div>
    </div>
  </div>
</form>

<?php
// Process form submission or additional logic as needed




if(isset($_POST['create_commitee']))
{


    $sql = "
    SELECT 
        SUM(CASE WHEN type = 3 THEN 1 ELSE 0 END) AS count_type_3,
        SUM(CASE WHEN type = 4 THEN 1 ELSE 0 END) AS count_type_4,
        SUM(CASE WHEN type = 2 THEN 1 ELSE 0 END) AS count_type_2
    FROM commitee_table_detailed
    WHERE commitee_id = '$id_tab'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count_type_3 = $row['count_type_3'];
        $count_type_4 = $row['count_type_4'];
        $count_type_2 = $row['count_type_2'];

        if($count_type_3>0 && $count_type_4>0 && $count_type_2 >0 )
        {
            $status=1;
            $sql="INSERT INTO `commitee_table`(`commitee_id`, `year`, `status`) VALUES ('$id_tab','$c_year','$status')";
            if(mysqli_query($con,$sql))
            {

            echo '<script>alert("ok")</script>';
            echo '<script>window.location.href="./"</script>';

            }
            else
            {
                echo "Error: " . mysqli_error($con);
            }
        }
        else{

            echo '<script>alert("Not applicable to create a commitee")</script>';


        }
    
       





    } else {
        echo "Error: " . mysqli_error($con);
    }
    







   echo '<script>alert("Added to list")</script>';

}
?>
