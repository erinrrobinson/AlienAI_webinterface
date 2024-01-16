<?php
// delete_images.php

// Implement authentication here to secure this endpoint

$directory = "/home/antfris/repos/uliap/uploads/photos";

// Get JSON input and decode it
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['files'])) {
    $filesToDelete = $data['files'];
    foreach ($filesToDelete as $file) {
        $filePath = $directory . '/' . $file;
        if (file_exists($filePath)) {
            unlink($filePath); // Deletes the file
        } else {
            // Optional: Log or echo if a file wasn't found or couldn't be deleted
            // echo "File not found: $filePath";
        }
    }
    echo "Files deleted successfully.";
} else {
    echo "No files specified for deletion.";
}
?>
