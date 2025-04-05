<?php

require '../../../database/config.php';

$ex_app_id=$_GET['id'];
$sql="DELETE  FROM extension_application WHERE id='$ex_app_id';";
if(mysqli_query($con,$sql))
{
    echo '<script>
    alert("Application cancelled");
    window.location.href = "../view_application.php";
</script>';

}
else
{
    echo "<script>alert('Failed to cancel the application: " . mysqli_error($con) . "');</script>";
}



?>


