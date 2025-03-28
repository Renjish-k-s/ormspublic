<?php include 'database/config.php';
session_start();  // Start session at the top
$_SESSION['id']=-1;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/index.css">
    </head>

    <body>
        <div class="login-container">
            <h2>Login</h2>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                </div>
            
                <button type="submit" class="btn btn-primary btn-block" id="login_button" name="login_button">Login</button>

                <!-- Create Author Button -->
                <a href="User/createUser.php" class="text-white btn btn-success btn-block mt-3">Join as Author/Applicant</a>
            </form>
        </div>

      
    
    </body>

    </html>
    <?php 

function check_user($email, $password, $con) {
    // Escape the email to prevent SQL injection
    $email = mysqli_real_escape_string($con, $email);

    // Prepare the SQL statement to select id, hashed password, and user type
    $sql = "SELECT id, password, usertype FROM user_table_global WHERE username_email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password with the hashed password in the database
        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
           //echo '<script>alert("Invalid username or password!");</script>';
            return false;
        }
    } else {
        //echo '<script>alert("Invalid username or password!");</script>';
        return false;
    }
}


if (isset($_POST["login_button"])) {

    
    $email = strip_tags(trim($_POST['email']));
    $password = strip_tags(trim($_POST['password']));

    $user = check_user($email, $password, $con);

    if ($user) {
        // Start the session and store user ID and email
        session_regenerate_id(true);  // Regenerate session ID to prevent session fixation attacks
        $_SESSION['id'] = $user['id'];  // Store the user ID in session
        //$_SESSION['email'] = $email;  // Store the email in session
        
        // Redirect user based on their usertype securely with PHP header
        if (htmlspecialchars($user['usertype']) == 5) {

            echo '<script>
            setTimeout(function() {
                window.location.href = "User/proposal/";
            }, 1000); // Delay redirection to show the alert
        </script>';


            //header("Location: ");
            exit();  // Exit after redirecting
        }
        elseif(htmlspecialchars($user['usertype']) == 4)
        {
            echo '<script>
            setTimeout(function() {
                window.location.href = "Reviewer/home/";
            }, 1000); // Delay redirection to show the alert
        </script>';
           // header("Location: ");
            exit();  // Exit after redirecting
        }
        elseif(htmlspecialchars($user['usertype']) == 3)
        {
            echo '<script>
            setTimeout(function() {
                window.location.href = "./Chairman/";
            }, 1000); // Delay redirection to show the alert
        </script>';

            //header("Location: ");
            exit();  // Exit after redirecting
        }
        elseif(htmlspecialchars($user['usertype']) == 2)
        {
            echo '<script>
            setTimeout(function() {
                window.location.href = "./Chairman/";
            }, 1000); // Delay redirection to show the alert
        </script>';

            //header("Location: ./Chairman/");
            exit();  // Exit after redirecting
        }
        elseif(htmlspecialchars($user['usertype']) == 1)
        {
            echo '<script>
            setTimeout(function() {
                window.location.href = "head_inistitution/home/";
            }, 1000); // Delay redirection to show the alert
        </script>';

            //header("Location: head_inistitution/home/");
            exit();  // Exit after redirecting
        }
        elseif(htmlspecialchars($user['usertype']) == 0)
        {
            header("Location: Reviewer/home/");
            exit();  // Exit after redirecting
        }
    } else {
        // Redirect back to login page on failure
        echo '<script>alert("Invalid username or password!");</script>';
    //    header("Location: ./");
        exit();  // Exit after redirecting
    }






}




?>
