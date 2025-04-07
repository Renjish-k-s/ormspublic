<?php
include '../../database/config.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Validate and sanitize input
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userid = intval($_GET['id']); // Convert to integer for safety

    // Prepare SQL statement
    $stmt = $con->prepare("UPDATE application_table SET status = 4 WHERE id = ?");
    $stmt->bind_param("i", $userid);

    if ($stmt->execute()) {
        echo '<script>
            alert("Approved successfully!");
            window.location.href = "../track_new_applications.php";
        </script>';
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
    }

    $stmt->close();
} else {
    echo '<script>alert("Invalid application ID!");</script>';
}

$con->close();
?>
