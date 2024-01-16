<?php

//this doesn't work idk why
ini_set('log_errors', 1);
ini_set('error_log', '/home/antfris/repos/uliap/error_log.log');

$target_dir = "/home/antfris/repos/uliap/uploads/photos/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "HEIC" && $imageFileType != "HEIF") {
  echo "Sorry, only JPG, JPEG, PNG, GIF, HEIC & HEIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
    $phpErrorMessage = error_get_last();
    //use below for checking php error
    // if ($phpErrorMessage) {
    //     echo " PHP Error: " . $phpErrorMessage['message'];
    // }
  }
}
?>
