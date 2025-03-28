<?php include '../database/config.php';?>
<?php include '../Gmail/test_mail.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Join as Applicant/Author</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <h2 class="text-center">Join as Applicant/Author</h2>
        <form method="post" action="">
          <div class="form-group">
            <label for="fullName">Enter Your Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="Enter full name*" name="fullName" required>
          </div>
          <div class="form-group">
            <label for="username">Enter Your Email ID</label>
            <input type="email" class="form-control" id="username" placeholder="Enter your email id*" name="username" required>
          </div>
          <div class="form-group">
          <label for="username">Select Your User Type</label>
            <select class="form-control" name="user_type" required>
            <option value="">select Usertype</option>
            <option value="0">Applicant</option>
            <option value="1">Inistitution Head</option>
            </select>
          </div>
        
          <div class="form-row">
            <div class="col-md-6">
              <button type="submit" name="create_user"  class="btn btn-primary btn-sm btn-block">Create User</button>
            </div>
            <div class="col-md-6">
              <button type="reset" class="btn btn-secondary btn-sm btn-block">Reset</button>
            </div>
          </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
function check_duplicate($email, $con)
{
    $email = mysqli_real_escape_string($con, $email);
    $sql = "SELECT * FROM user_table_global WHERE username_email='$email'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }

    return mysqli_num_rows($result) > 0;
}

if (isset($_POST['create_user'])) {
    $name = strip_tags(trim($_POST['fullName']));
    $email = strip_tags(trim($_POST['username']));
    $user_type = strip_tags(trim($_POST['user_type']));

    $temp_pass = substr(bin2hex(random_bytes(5)), 0, 5);
    $hashed_pass =password_hash($temp_pass, PASSWORD_DEFAULT);  // Convert password to MD5
    if($user_type==0)
    {
    $usertype=5;
    }
    else
    {
    $usertype=1;
    }
    $is_duplicate = check_duplicate($email, $con);

    if ($is_duplicate) {    
        echo '<script>alert("User already exists");</script>';
        echo '<script>window.location.href="createUser.php"</script>';
    } else {
        if (mailer_test($email, $temp_pass)) {
            $sql = "INSERT INTO user_table_global (holder_name, username_email,password,usertype) VALUES ('$name', '$email', '$hashed_pass','$usertype')";

            

            if (mysqli_query($con, $sql)) {

              $last_id = $con->insert_id;


              if($user_type==0)
              {
              $sql_up="INSERT INTO `user_details`(`user_id`) VALUES ('$last_id')";
              }
              elseif($user_type==1)
              {
              $sql_up="INSERT INTO `institution_details`(`user_id`) VALUES ('$last_id')";
              }
              


              if (mysqli_query($con, $sql_up)) {
                echo '<script>alert("User created successfully. Username and password have been sent via email.");</script>'; 

                echo '<script>window.location.href="../"</script>';
              }
            } else {
                echo 'Error: ' . mysqli_error($con);
            }
        } else {
            echo '<script>alert("Failed to send email. Please try again.");</script>';
            echo '<script>window.location.href="createUser.php"</script>';
        }
    }
}
?>
