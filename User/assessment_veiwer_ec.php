<?php
include '../database/config.php';

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get application_id from URL
$application_id = $_GET['id'] ?? '';

if (empty($application_id)) {
    die("Application ID is missing.");
}

// Fetch reviews from the database
$sql="SELECT * FROM `user_table_global` WHERE usertype='4' AND status='1' ;";
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
        $sl=0;
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Reviewer Name</th>
                <th>Review</th>
                <th>Chat box</th>
                <th>Approval status</th>

            </tr>
            <?php while ($row = mysqli_fetch_array($res)): 
              

                ?>

                <tr>
                    <td><?php echo ++$sl;?></td>
                    <td><?php echo "Reviewer".$sl ?></td>

                    <td><a href="./view_reviews.php?id=<?php echo $row['id']; ?>&appid=<?php echo $application_id ;?>">view reviews</a></td>
                    <?php                     
                     $user_id= $row['id'];    
                    ?>
                    <td><a href="./chat.php?aid=<?php echo $application_id ; ?>&revid=<?php echo $user_id ;?>">view chats</a></td>

                    <?php
$user_id = $row['id'];
$sql_vote = "SELECT * FROM vote_table WHERE app_id='$application_id' AND reviewer_id='$user_id';";
$res_vote = mysqli_query($con, $sql_vote);
$count = mysqli_num_rows($res_vote);

if ($count == 1) {
    $vote_row = mysqli_fetch_array($res_vote);

    if ($vote_row && isset($vote_row['vote_status'])) {
        ?>
        <td>
            <?php
            if ($vote_row['vote_status'] == 1) {
                echo "Approved";
            } else {
                echo "Disapproved";
            }
            ?>
        </td>
        <?php
    } else {
        echo "<td>Error fetching vote status</td>";
    }
} else {
    echo "<td>Not responded</td>";
}
?>

                </tr>
            <?php endwhile; ?>
        </table>
   

    <a href="./track_initial_application.php" class="back-btn">Back to Home</a>
</div>

</body>
</html>


