<?php
include '../GMail/otp.php';
require '../database/config.php';


if (isset($_POST['register'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo"<script>alert('failed')</script>";
        die();
    }

    $name=$_POST['fullname'];
    $email_id=$_POST['email_id'];
    $usertype=$_POST['usertype'];
    $status="0";
    $otp = rand(100000, 999999);
    $password= password_hash($otp, PASSWORD_DEFAULT);

    $query = "SELECT COUNT(*) AS count FROM user_table_global WHERE username_email = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email_id); // Bind email as a string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $count);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($count > 0) {
            echo "<script>setTimeout(() => {
                let overlay = document.querySelector('#duplicateemail');
                if (overlay) overlay.style.display = 'flex';
            }, 500);</script>";
        }
        else
        {
            if (!mailer_test($email_id, $otp)) {
                    echo"<script>alert('veification mail failed.')</script>";
                    
                }
                else
                {
                    $insert_query = "INSERT INTO user_table_global (holder_name, username_email, password, usertype, status) 
                    VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($con, $insert_query);
                    mysqli_stmt_bind_param($stmt, "sssss", $name, $email_id, $password, $usertype, $status);

                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_commit($con);
                        unset($_SESSION['csrf_token']); // Invalidate CSRF token

                        echo "<script>setTimeout(() => {
                                    let overlay = document.querySelector('.account-success-overlay');
                                    if (overlay) overlay.style.display = 'flex';
                                }, 500);</script>";

                                
                    } else {
                        echo"<script>alert('User registeration failed.')</script>";
                    }

                   // echo"<script>alert('veification mail sended')</script>";
                }
            //echo"<script>alert('winnnn')</script>";
        }

    } else {
        echo"<script>alert('failed')</script>";
    }
}


if(isset($_POST['loginbutton']))
{
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo"<script>alert('failed')</script>";
        die();
    }

    $email_id = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);




    $query_login = "SELECT id,username_email, password, usertype FROM user_table_global WHERE username_email = ?";
    $stmt = mysqli_prepare($con, $query_login);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $user_id, $username_email, $hashed_password, $usertype);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        
        if (password_verify($password, $hashed_password)) {
            unset($_SESSION['csrf_token']); // Invalidate CSRF token
            $_SESSION['user_id'] = $user_id;
            switch($usertype)
            {
                case '5':

                    echo "<script>
                        setTimeout(() => {
                            window.location.href = '../User/'; // Change 'success.php' to your desired page
                        }, 500);
                    </script>";
                    exit;
                case '1':

                    echo "<script>
                            setTimeout(() => {
                                window.location.href = '../head_inistitution/'; // Change 'success.php' to your desired page
                            }, 500);
                        </script>";
                    exit;
                case '8':
                    echo "<script>
                                setTimeout(() => {
                                    window.location.href = '../sc_member_secretary/'; // Change 'success.php' to your desired page
                                }, 500);
                            </script>";
                    exit;
                case '7':

                    echo "<script>
                                    setTimeout(() => {
                                        window.location.href = '../sc_reviewer/'; // Change 'success.php' to your desired page
                                    }, 500);
                                </script>";
                    exit;

                case '4':

                        echo "<script>
                                        setTimeout(() => {
                                            window.location.href = '../Reviewer/'; // Change 'success.php' to your desired page
                                        }, 500);
                                    </script>";
                    exit;
                    
                case '2':

                        echo "<script>
                                        setTimeout(() => {
                                        window.location.href = '../Chairman/'; // Change 'success.php' to your desired page
                                                        }, 500);
                                                    </script>";
                    exit;
                    case '3':

                        echo "<script>
                                        setTimeout(() => {
                                        window.location.href = '../ec_member_secretary/'; // Change 'success.php' to your desired page
                                                        }, 500);
                                                    </script>";
                    exit;
                    case '6':

                        echo "<script>
                                        setTimeout(() => {
                                        window.location.href = '../sc_chairman/'; // Change 'success.php' to your desired page
                                                        }, 500);
                                                    </script>";
                    exit;


            }
           // echo"<script>alert('Logged in')</script>";
        }
        else
        {
            echo "<script>setTimeout(() => {
                let overlay = document.querySelector('#invalidlogin');
                if (overlay) overlay.style.display = 'flex';
            }, 500);</script>";
        }

    }else
    {
        echo "<script>setTimeout(() => {
            let overlay = document.querySelector('#invalidlogin');
            if (overlay) overlay.style.display = 'flex';
        }, 500);</script>";

    }

    }else
    {
        echo"<script>alert('INVALID CONNECTION')</script>";

    }
}


