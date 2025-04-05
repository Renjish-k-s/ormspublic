<?php
session_start();
include '../../database/config.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if required session and URL parameters exist
if (!isset($_SESSION['user_id'], $_GET['aid'], $_GET['status'])) {
    die("Missing required parameters.");
}

// Retrieve values
$reviewer_id = $_SESSION['user_id'];  // Reviewer ID from session
$app_id = intval($_GET['aid']);       // Application ID from URL
$vote_status = intval($_GET['status']); // Vote status from URL
$rev_type = 1;  // Assuming a default review type (modify as needed)

// Prepare the SQL statement
$stmt = $con->prepare("INSERT INTO vote_table (app_id, reviewer_id, rev_type, vote_status) VALUES (?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $con->error);
}

// Bind parameters
$stmt->bind_param("iiii", $app_id, $reviewer_id, $rev_type, $vote_status);

// Execute the statement
if ($stmt->execute()) {
    echo '<script>
    alert("Approved successfully!");
    window.location.href = "../track_new_applications.php";
</script>';} else {
    echo '<script>alert("Error: ' . $stmt->error . '");</script>';
}

// Close statement and connection
$stmt->close();
?>
