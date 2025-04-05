<?php 
session_start();
?>
<?php include '../Partials/header.php'; ?>
<style>
        a {
            text-decoration: none;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-family: Arial, sans-serif;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        thead {
            background: linear-gradient(135deg, #2C3E50, #3498DB);
            color: white;
        }
        th, td {
            padding: 12px;
            border-bottom: 2px solid #ddd;
        }
    </style>
</head>
<body>

<header>
    <!-- Include your header content here -->
</header>
<?php

$user_id = $_SESSION['user_id']; // Get user_id from session

// Prepare and execute query using prepared statements
$stmt = $con->prepare("SELECT * FROM extension_application WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>SL No</th>
                <th>Application ID</th>
                <th>View application</th>   
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sl_no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$sl_no}</td>";
                echo "<td>{$row['app_id']}</td>";
                echo "<td><a href='./view_application.php?id={$row['id']}'>View Application</a></td>";
                echo "<td>" . ($row['status'] == 1 ? "Approved" : "Pending") . "</td>";
                echo "<td><a href='./db/delete_app.php?id={$row['id']}'>Cancel Application</a></td>";
                echo "</tr>";
                $sl_no++;
            }
            ?>        
            
        </tbody>
    </table>
</div>