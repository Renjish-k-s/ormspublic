<?php
// Check if an image parameter exists
if (!isset($_GET['img'])) {
    http_response_code(400);
    die("Invalid request");
}

// Decode the image file name
$image = urldecode($_GET['img']);
$imagePath = __DIR__ . "/uploads/" . basename($image); // Prevent directory traversal

// Check if the file exists
if (!file_exists($imagePath)) {
    http_response_code(404);
    die("Image not found");
}

// Get file MIME type
$mimeType = mime_content_type($imagePath);
header("Content-Type: " . $mimeType);
readfile($imagePath);
exit;
?>
