<?php
require '../../database/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(['message' => 'Invalid CSRF token']));
    }


    $uploadDir = "../../../uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    function uploadFile($file, $uploadDir, $allowedExtensions = ['jpg', 'png', 'jpeg'], $maxFileSize = 2 * 1024 * 1024) {
        if (!isset($_FILES[$file]) || $_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $fileTmpPath = $_FILES[$file]['tmp_name'];
        $fileName = basename($_FILES[$file]['name']);
        $fileSize = $_FILES[$file]['size'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExtensions) || $fileSize > $maxFileSize) {
            return null;
        }

        $newFileName = time() . "_" . uniqid() . "." . $fileExt;
        $destinationPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            return $newFileName;
        }
        return null;
    }

    $id = $_SESSION['user_id'];
    $profile_photo = uploadFile('profile_photo', $uploadDir);
    $gcp_upload = uploadFile('gcp_upload', $uploadDir, ['pdf']);
    $resume = uploadFile('resume', $uploadDir, ['pdf']);
    $signature = uploadFile('signature', $uploadDir);

    $status = "1";
    $holder_name = $_POST['fullname'];
    $com_pass1 = $_POST['n_password'];
    $com_pass2 = $_POST['o_password'];

    if ($com_pass1 !== $com_pass2) {
        die(json_encode(['message' => 'New password and confirm password mismatch']));
    }

    $mobileno=$_POST['Mobile'];
    if (strlen($mobileno)!=10) {
        # code...
        die(json_encode(['message' => 'Mobile number should contain 10 numbers']));

    }

    $password = password_hash($com_pass1, PASSWORD_DEFAULT);

    $storage_confidentiality = json_encode([
        'Mobile' => $_POST['Mobile'] ?? '',
        'sex' => $_POST['sex'] ?? '',
        'address' => $_POST['address'] ?? '',
        'a_email' => $_POST['a_email'] ?? '',
        'qualification' => $_POST['qualification'] ?? '',
        'gcp_status' => $_POST['gcp_status'] ?? ''
    ]);

    $more_details = $storage_confidentiality;  // Set more_details

    $sql = "UPDATE user_table_global SET password = ?, holder_name = ?, photo_path = ?, signature = ?, resume = ?, gcp_upload = ?, more_details = ?, status = ? WHERE id = ?";

    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("ssssssssi", $password, $holder_name, $profile_photo, $signature, $resume, $gcp_upload, $more_details, $status, $id);

        if ($stmt->execute()) {

            die(json_encode(['message' => '1']));

            // echo '<script>
            //     alertcustom("Record updated successfully. Please Relogin!", 1);
            //     setTimeout(function() {
            //         window.location.href = "../../";
            //     }, 3000);
            // </script>';
        } else {
            die(json_encode(['message' => addslashes($stmt->error)]));

          //  echo "<script>alert('Error updating record: " .  . "');</script>";
        }

        $stmt->close();
    } else {
        die(json_encode(['message' => addslashes($con->error)]));

        //echo "<script>alert('Error preparing statement: " .  . "');</script>";
    }
}
?>
