<?php
require "trial.php"; // Include the Translator class
require 'encapsulation.php'; // Include sentiment analysis proceseaweasdas

?>

<!DOCTYPE html>
<html>
<head>
<title>Text Translator with Sentiment Analysis</title>
</head>
<body>
  <h1>Text Translator with Sentiment Analysis</h1>
  <form method="post">
    <label for="text">Text to Translate:</label><br>
    <textarea name="text" id="text" rows="5" cols="30"></textarea><br><br>
    <label for="from">Source Language:</label><br>
    <select name="from" id="from">
      <?php
        
        $languages = array(
          'en' => 'English',
          'fil' => 'Filipino',
          'de' => 'German',
          // Add more languages as needed
        );
        foreach ($languages as $code => $name) {
          echo "<option value='$code'>$name</option>";
        }
      ?>
    </select><br><br>
    <input type="submit" value="Translate and Analyze">
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    $from = $_POST['from'];
    $to = 'en'; // Target language is always English

    $translator = new Translator();
    $translatedText = $translator->translateText($text, $to, $from);

    // Sentiment Analysis on translated text
    
    $sentimentAnalyzer = new SentimentsWithLibrary();
    $sentimentResult = $sentimentAnalyzer->calculateSentiment($translatedText);
    $sentiment_score = $sentimentResult["compound"];

    echo "<h3>Translation (to English):</h3>";
    echo "<p>$translatedText</p>";
  //placeholder pa lang for emotions ung echo
    echo "<h3>Sentiment Analysis:</h3>";
    if ($sentiment_score > 0.5) {
      echo "<p>POSITIVE</p>";
    } elseif ($sentiment_score > 0.2) {
      echo "<p>SLIGHTLY POSITIVE</p>";
    } elseif ($sentiment_score < -0.05) {
      echo "<p>NEGATIVE</p>";
    } elseif ($sentiment_score < -0.2) {
      echo "<p>SLIGHTLY NEGATIVE</p>";
    } else {
      echo "<p>NEUTRAL</p>";
    }
  }
  ?>
</body>
</html>
