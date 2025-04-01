<?php include '../../database/config.php'; ?>

<?php

$commitee_id = $_GET['id'];
$user_type = $_GET['usertype'];
$userid = $_GET['userid'];

$sql = "DELETE FROM `commitee_table_detailed` WHERE `commitee_id` = '$commitee_id' AND `user_id` = '$userid' AND `type` = '$user_type'";

if (mysqli_query($con, $sql)) {
    echo '<script>
    alert("Removed from the list");
    window.location.href = document.referrer + "#continue_chairman"; // Redirect to previous page and scroll to the target element
  </script>';
} else {
    echo '<script>alert("Error in removing");</script>';
}

?>
