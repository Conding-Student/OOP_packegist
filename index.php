<?php
require 'encapsulation.php'; // Added a semicolon here



$sentimentAnalyzer = new SentimentsWithLibrary();

$output_text_with_emoji = $sentimentAnalyzer->calculateSentiment("");

print_r($output_text_with_emoji);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>