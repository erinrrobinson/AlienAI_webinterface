<?php
$text_content = $_POST['userText']; // Get text from form
$text_file = "/home/antfris/repos/uliap/uploads/text/user_text.txt"; // File where text will be saved

// Append text to the file
file_put_contents($text_file, $text_content . PHP_EOL, FILE_APPEND);

echo "Text uploaded successfully.";
?>
