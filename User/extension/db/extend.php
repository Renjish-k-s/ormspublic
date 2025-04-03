<?php

require '../../../database/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF protection
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(['message' => 'Invalid CSRF token']));
    }

    // Get form data
    $appid = $_POST['appid'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $status = 0; // Default status
    $userid=$_SESSION['user_id'];

    $created_at = date('Y-m-d H:i:s'); // Timestamp for creation time

    // Database connection (Ensure `$conn` is correctly set up in config.php)
    $stmt = $con->prepare("INSERT INTO extension_application (app_id,user_id,description, status, on_create) VALUES (?, ?, ?, ?,?)");
    
    if ($stmt) {
        $stmt->bind_param("sssis", $appid,$userid, $description, $status, $created_at); 
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(['message' => '1']);
        } else {
            echo json_encode(['message' => 'Error inserting record']);
        }

        $stmt->close();
    } else {
        echo json_encode(['message' => 'Database error: ' . $con->error]);
    }

    $con->close();
}
?>
