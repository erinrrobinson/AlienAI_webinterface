<?php
// list_images.php

$directory = "/home/antfris/repos/uliap/uploads/photos";
$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'heic', 'heif');

// Check if the directory exists
if (!is_dir($directory)) {
    echo "Directory does not exist: $directory";
    exit;
}

// Initialize an array to store image file names
$images = array();

// Scan the directory for files
$files = scandir($directory);

// Check for errors during scanning
if ($files === false) {
    echo "Error occurred while scanning directory.";
    exit;
}

// Filter and add image files to the $images array
foreach ($files as $file) {
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (in_array($extension, $allowedExtensions)) {
        $images[] = $file;
    }
}

// Return the list of image file names as JSON
header('Content-Type: application/json');
echo json_encode($images);
?>
