<?php
include '../database/config.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get application_id from URL
$userid = $_GET['id'] ?? '';
$application_id = $_GET['appid'] ?? '';



// Fetch reviews from the database
$sql="SELECT * FROM `scientific_revew_table` WHERE application_id='$application_id' AND reviewer_id	='$userid' ;";
$res=mysqli_query($con,$sql);




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
    <!-- <h2>Reviews for Application ID: <?php echo htmlspecialchars($application_id); ?></h2> -->

    <?php 
        $sl=1;
        ?>
        <table>
            <tr>
                <th>SlNo</th>
                <th>Review</th>
               

            </tr>
            <?php while ($row = mysqli_fetch_array($res)): 
              

                ?>

                <tr>
                    <td><?php echo $sl++;?></td>
                    <td><?php echo htmlspecialchars($row['review']); ?></td>

                  
                </tr>
            <?php endwhile; ?>
        </table>
   

    <a href="../track_new_applications.php" class="back-btn">Back to Home</a>
</div>

</body>
</html>


