<?php
header('Content-Type: application/json');
$file_path = "/home/antfris/repos/uliap/uploads/text/user_text.txt";

function readFileContents($path) {
    if (file_exists($path)) {
        return file($path, FILE_IGNORE_NEW_LINES);
    }
    return [];
}

function clearFile($path) {
    file_put_contents($path, "");
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $contents = readFileContents($file_path);
    echo json_encode($contents);
    clearFile($file_path);  // Clear the file after reading its contents
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
