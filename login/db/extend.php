<?php

require '../../database/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF protection
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(['message' => 'Invalid CSRF token']));
    }

    // Get form data
    $appid = $_POST['appid'];
    $name = $_POST['name'];
    $address = $_POST['adderss'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $status = 0; // Default status
    $created_at = date('Y-m-d H:i:s'); // Timestamp for creation time

    // Database connection (Ensure `$con` is correctly set up in config.php)
    $stmt = $con->prepare("INSERT INTO complaint_box (appid, name, adderss, email, subject, description, status, on_created) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssssssis", $appid, $name, $address, $email, $subject, $description, $status, $created_at);
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
