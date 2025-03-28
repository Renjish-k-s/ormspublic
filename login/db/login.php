<?php
session_start();
include '../../database/config.php'; // Ensure this file contains database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    if (empty($email) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }
    
    $stmt = $conn->prepare("SELECT * FROM user_table_global WHERE username_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
             // Checking if the user is active
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['holder_name'];
                $_SESSION['user_type'] = $user['usertype'];
                
                switch ($user['usertype']) {
                    case '1':
                        echo json_encode(["status" => "success", "redirect" => "../User/"]);
                        break;
                    // case '2':
                    //     echo json_encode(["status" => "success", "redirect" => "../User/"]);
                    //     break;
                    // case '3':
                    //     echo json_encode(["status" => "success", "redirect" => "../User/"]);
                    //     break;
                    // case '4':
                    //     echo json_encode(["status" => "success", "redirect" => "../User/"]);
                    //     break;
                    // case '5':
                    //     echo json_encode(["status" => "success", "redirect" => "../User/"]);
                    //     break;
                    default:
                        echo json_encode(["status" => "error", "message" => "Invalid user type."]);
                        break;
                
        
                     } 
                    
                    }else {
            echo json_encode(["status" => "error", "message" => "Invalid credentials."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No account found with this email."]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
