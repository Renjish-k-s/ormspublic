<?php

require '../../../database/config.php';
require '../../../GMail/Appoint_person.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(['message' => 'Invalid CSRF token']));
    }


    $name=$_POST['fullname'];
    $email_id=$_POST['email_id'];
    $usertype=$_POST['usertype'];
    $status="0";
    $otp = rand(100000, 999999);
    $password= password_hash($otp, PASSWORD_DEFAULT);

    $storage_confidentiality = json_encode([
        'inistitution_id' =>  '0',
    ]);

    

    $query = "SELECT COUNT(*) AS count FROM user_table_global WHERE username_email = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email_id); // Bind email as a string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $count);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($count > 0) {
            die(json_encode(['message' => 'user already exists']));

        }
        else
        {
            if (!mailer_test($email_id, $otp)) {
                die(json_encode(['message' => 'Email verfication failed']));
                    
                }
                else
                {
                    $insert_query = "INSERT INTO user_table_global (holder_name, username_email, password, usertype, status,more_details) 
                    VALUES (?, ?, ?, ?, ?,?)";
                    $stmt = mysqli_prepare($con, $insert_query);
                    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email_id, $password, $usertype, $status, $storage_confidentiality);

                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_commit($con);
                        unset($_SESSION['csrf_token']); // Invalidate CSRF token

                        die(json_encode(['message' => '1']));


                                
                    } else {
                        die(json_encode(['message' => 'user registerstion failed']));
                    }

                   // echo"<script>alert('veification mail sended')</script>";
                }
            //echo"<script>alert('winnnn')</script>";
        }

    } else {
        die(json_encode(['message' => 'user registerstion failed']));
    }

}