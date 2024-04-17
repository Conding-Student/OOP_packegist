<?php
require 'encapsulation.php'; // Added a semicolon here

$sentimentAnalyzer = new SentimentsWithLibrary();

$resulta = $sentimentAnalyzer->calculateSentiment("I am very angry!!");



$sentiment_result="";
if ($resulta["compound"]>0.5)
{
    echo $sentiment="POSITIBO";
}
elseif($resulta["compound"] < -0.05)
{
    echo $sentiment_result = "NEGATIBO";
}
else{
    echo $sentiment_result = "TABLADO";
}
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