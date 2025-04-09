<?php
include '../../database/config.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Validate and sanitize input
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userid = intval($_GET['id']); // Convert to integer for safety

    // Prepare UPDATE SQL statement
    $stmt = $con->prepare("UPDATE application_table SET status = 7 WHERE id = ?");
    $stmt->bind_param("i", $userid);

    if ($stmt->execute()) {
        $stmt->close();

        // Now delete from vote_table
        $delStmt = $con->prepare("DELETE FROM vote_table WHERE app_id = ?");
        $delStmt->bind_param("i", $userid);
        $delStmt->execute();
        $delStmt->close();

        echo '<script>
            alert("Applied successfully!");
            window.location.href = "../track_initial_application.php";
        </script>';
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
        $stmt->close();
    }

} else {
    echo '<script>alert("Invalid application ID!");</script>';
}

$con->close();
?>
