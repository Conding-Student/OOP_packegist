<?php
require 'encapsulation.php'; // Added a semicolon here

$sentimentAnalyzer = new SentimentsWithLibrary();

$resulta = $sentimentAnalyzer->calculateSentiment("I am a little glad");

$sentiment_result="";
$sentiment_score = $resulta["compound"];

if ($sentiment_score > 0.5) {
    $sentiment_result = "POSITIVE";
} elseif ($sentiment_score > 0.2) {
    $sentiment_result = "SLIGHTLY POSITIVE";
} elseif ($sentiment_score < -0.05) {
    $sentiment_result = "NEGATIVE";
} elseif ($sentiment_score < -0.2) {
    $sentiment_result = "SLIGHTLY NEGATIVE";
} else {
    $sentiment_result = "NEUTRAL";
}

echo $sentiment_result;
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
