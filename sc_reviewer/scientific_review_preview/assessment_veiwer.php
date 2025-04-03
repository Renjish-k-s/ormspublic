<?php

session_start();

include '../../database/config.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get application_id from URL
$application_id = $_GET['id'] ?? '';
$user=$_SESSION['user_id'];
if (empty($application_id)) {
    die("Application ID is missing.");
}

// Fetch reviews from the database
$query = "SELECT * FROM scientific_revew_table WHERE application_id = ? and reviewer_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $application_id,$user);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            padding: 15px;
            color: red;
        }
        .back-btn {
            display: inline-block;
            padding: 8px 12px;
            margin-top: 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Reviews for Application ID: <?php echo htmlspecialchars($application_id); ?></h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Review</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['review']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p class="no-data">No reviews found for this application.</p>
    <?php endif; ?>

    <a href="../track_new_applications.php" class="back-btn">Back to Home</a>
</div>

</body>
</html>

<?php
$stmt->close();
$con->close();
?>
