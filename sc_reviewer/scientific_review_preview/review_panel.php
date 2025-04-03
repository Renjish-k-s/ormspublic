<?php 
session_start();

include '../../database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Review System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="./css/reviewpanel.css" rel="stylesheet"></link>
    <style>
       
    </style>
</head>

<?php

$stmt = $con->prepare("SELECT * FROM application_table WHERE id = ?");
$stmt->bind_param("i", $id);  // 'i' stands for integer
// Set parameter and execute
$id = $_GET['id'];
$stmt->execute();

// Get result
$result = $stmt->get_result();
$row = $result->fetch_assoc();  

$administrative_details = json_decode($row['administrative_details'], true);
$research_related_info = json_decode($row['research_related_info'], true);
$participant_data	 = json_decode($row['participant_data'], true);
$benefit_risk	 = json_decode($row['benefit_risk'], true);

$informed_consent	 = json_decode($row['informed_consent'], true);

$compensation_data	 = json_decode($row['compensation_data'], true);

$storage_confidentality		 = json_decode($row['storage_confidentality'], true);
$documents_files	 = json_decode($row['documents_files'], true);







$academic_research = explode(",", $row['academic_research']);
$research_type = explode(",", $row['research_type']);
$consent_type = explode(",", $row['consent_type']);
$waiver_reason = explode(",", $row['waiver_reason']);





?>
<body>
    <div class="container-fluid">
        <div class="split-container">
            <!-- Left Panel (Application) -->
            <div class="panel" id="leftPanel">
                <div class="panel-header">
                    <h4><i class="fas fa-file-alt me-2"></i>Application Details</h4>
                </div>
                <div class="panel-content">

                <?php include './adminitrative_details.php'; ?>
                <?php include './research_related_info.php'; ?>
                <?php include './participant_related.php'; ?>
                <?php include './benefitsandrisk.php'; ?>
                <?php include './informed_concent.php'; ?>
                <?php include './compenstion_patment.php'; ?>
                <?php include './storage_confidentality.php'; ?>
                <?php include './documents.php'; ?>


                    <!-- Add more application fields as needed -->
                </div>
            </div>

            <!-- Resizer -->
            <div class="resizer" id="dragHandle"></div>

            <!-- Right Panel (Review) -->
            <div class="panel" id="rightPanel">
                <div class="panel-header">
                    <h4><i class="fas fa-edit me-2"></i>Review Form</h4>
                </div>

<section id="review">
        <h1 class="text-center">Assessment Items</h1>
        <form action="" method="post">
                <div class="panel-content text-center">
                   <!-- <input type="text" name="reviewername" id="" placeholder="Enter the revewer name"> -->
                <textarea class="form-control"  name="review_passage" id="" cols="30" rows="15"><?php echo $_SESSION['user_id'];  ?></textarea>

                <button type="submit" name="submit_review" class="btn btn-primary" style="align:center">Submit review</button>
                </div>
        </form>
            </div>
        </div>

        <!-- Chat Button and Panel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize drag functionality
        const leftPanel = document.getElementById('leftPanel');
        const rightPanel = document.getElementById('rightPanel');
        const dragHandle = document.getElementById('dragHandle');
        let isDragging = false;

        dragHandle.addEventListener('mousedown', function(e) {
            isDragging = true;
            document.addEventListener('mousemove', handleDrag);
            document.addEventListener('mouseup', stopDrag);
        });

        function handleDrag(e) {
            if (!isDragging) return;

            const containerWidth = document.querySelector('.split-container').offsetWidth;
            const percentage = (e.clientX / containerWidth) * 100;

            // Limit the minimum and maximum panel sizes
            if (percentage >= 30 && percentage <= 70) {
                leftPanel.style.width = `${percentage}%`;
                rightPanel.style.width = `${100 - percentage}%`;
                dragHandle.style.left = `${percentage}%`;
            }
        }

        function stopDrag() {
            isDragging = false;
            document.removeEventListener('mousemove', handleDrag);
            document.removeEventListener('mouseup', stopDrag);
        }

        // Chat panel toggle
        function toggleChat() {
            document.getElementById('chatPanel').classList.toggle('active');
        }

        // Prevent text selection while dragging
        document.addEventListener('selectstart', function(e) {
            if (isDragging) e.preventDefault();
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            // Reset panel positions if needed
            const leftWidth = parseFloat(leftPanel.style.width) || 50;
            dragHandle.style.left = `${leftWidth}%`;
        });
    </script>


<?php
if (isset($_POST['submit_review'])) {
    // Get the connection again or move this code before the connection is closed
    include '../../database/config.php';
    
    $application_id = $_GET['id'] ?? 0; // Get ID from URL and ensure it's a valid integer
    $review = $_POST['review_passage'] ?? ''; // Get review text
    $status = 0; // Default status
    $userid = $_SESSION['user_id'];
    

    if (!empty($application_id) && !empty($review)) {
        // Prepare SQL statement
        $stmt = $con->prepare("INSERT INTO scientific_revew_table (application_id,reviewer_id, review, status, time) VALUES (?,?, ?, ?, NOW())");
        if (!$stmt) {
            die("Prepare failed: " . $con->error);
        }

        // Use 'i' for integer parameter type for application_id
        $stmt->bind_param("isss", $application_id,$userid,$review, $status);

        // Execute and check if successful
        if ($stmt->execute()) {
            echo '<script>
            alert("Review submitted successfully!");
            window.location.href = "../track_new_applications.php"; // Navigate to dashboard or any other page
        </script>';        } else {
            echo '<script>alert("Error: ' . $stmt->error . '");</script>';
        }

        $stmt->close();
    } else {
        echo '<script>alert("All fields are required!");</script>';
    }
    
    // Close connection here
    $con->close();
}
?>
</body>
</html>
