<?php include '../../database/config.php'; ?>

<?php

$commitee_id = $_GET['id'];
$user_type = $_GET['usertype'];
$userid = $_GET['userid'];
$status = 0;

/////////////////////////////////////////////////////////

function checknumber($user_type, $commitee_id, $con)
{
    $sql = "SELECT * FROM commitee_table_detailed WHERE commitee_id='$commitee_id' AND type='$user_type'";
    $res = mysqli_query($con, $sql); // Corrected argument order
    return mysqli_num_rows($res);
}

/////////////////////////////// Chairman Logic

if ($user_type == 2) {
    $count = checknumber($user_type, $commitee_id, $con);

    if ($count == 0) { // Allow only one chairman
        $sql = "INSERT INTO `commitee_table_detailed`(`commitee_id`, `user_id`, `type`, `status`) VALUES ('$commitee_id','$userid','$user_type','$status')";
        if (mysqli_query($con, $sql)) {
            echo '<script>
                alert("Added to list");
                window.location.href = document.referrer + "#continue_chairman";
            </script>';
        } else {
            echo '<script>alert("Error in adding");</script>';
        }
    } else {
        echo '<script>alert("Cannot add two Chairmen to the same committee.");</script>';
    }
}

/////////////////////////////// Member Secretary Logic

if ($user_type == 3) {
    $count = checknumber($user_type, $commitee_id, $con);

    if ($count == 0) { // Allow only one member secretary
        $sql = "INSERT INTO `commitee_table_detailed`(`commitee_id`, `user_id`, `type`, `status`) VALUES ('$commitee_id','$userid','$user_type','$status')";
        if (mysqli_query($con, $sql)) {
            echo '<script>
                alert("Added to list");
                window.location.href = document.referrer + "#continue_chairman";
            </script>';
        } else {
            echo '<script>alert("Error in adding");</script>';
        }
    } else {
        echo '<script>alert("Cannot add two Member Secretaries to the same committee.");</script>';
    }
}



if ($user_type == 4) {

        $sql = "INSERT INTO `commitee_table_detailed`(`commitee_id`, `user_id`, `type`, `status`) VALUES ('$commitee_id','$userid','$user_type','$status')";
        if (mysqli_query($con, $sql)) {
            echo '<script>
                alert("Added to list");
                window.location.href = document.referrer + "#continue_chairman";
            </script>';
        } else {
            echo '<script>alert("Error in adding");</script>';
        }
    } else {
        echo '<script>alert("Cannot add two Member Secretaries to the same committee.");</script>';
    }


?>
