<?php
require "trial.php"; // Include the Translator
require 'encapsulation.php'; // Include sentiment analysis process
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sentiment Analyzer</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/4a85ec1aea.js" crossorigin="anonymous"></script>
</head>

<body>
  <section class="first">

    <div class="wrapper">

      <form action="">

        <div class="emoji">
          <i class="fas fa-smile" id="emoji-smile"></i>
          <i class="fas fa-frown" id="emoji-frown"></i>
          <i class="fas fa-meh" id="emoji-meh"></i>
        </div>

        <input type="text" name="text" id="text">

        <div class="type-of-emoji">
          <p class="bad" id="text-bad">Bad</p>
          <p class="good" id="text-good">Good</p>
        </div>

        <div class="dropdown">
          <select name="from" id="from" class="selected">
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
          </select>
        </div>

        <div class="button">
          <button><input type="submit" value="Translate and Analyze"></button>
        </div>

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

        echo "<h3>Sentiment Analysis:</h3>";
        if ($sentiment_score > 0.5) {
            echo "<p>POSITIVE</p>";
            echo "<script>";
            echo "document.getElementById('emoji-smile').style.display = 'inline';";
            echo "document.getElementById('emoji-frown').style.display = 'none';";
            echo "document.getElementById('emoji-meh').style.display = 'none';";
            echo "document.getElementById('text-good').style.display = 'block';";
            echo "document.getElementById('text-bad').style.display = 'none';";
            echo "</script>";
          } elseif ($sentiment_score > 0.2) {
            echo "<p>SLIGHTLY POSITIVE</p>";
            echo "<script>";
            echo "document.getElementById('emoji-smile').style.display = 'inline';";
            echo "document.getElementById('emoji-frown').style.display = 'none';";
            echo "document.getElementById('emoji-meh').style.display = 'none';";
            echo "document.getElementById('text-good').style.display = 'block';";
            echo "document.getElementById('text-bad').style.display = 'none';";
            echo "</script>";
          } elseif ($sentiment_score < -0.05) {
            echo "<p>NEGATIVE</p>";
            echo "<script>";
            echo "document.getElementById('emoji-smile').style.display = 'none';";
            echo "document.getElementById('emoji-frown').style.display = 'inline';";
            echo "document.getElementById('emoji-meh').style.display = 'none';";
            echo "document.getElementById('text-good').style.display = 'none';";
            echo "document.getElementById('text-bad').style.display = 'block';";
            echo "</script>";
          } elseif ($sentiment_score < 0.2 && $sentiment_score > -0.05) {
            echo "<p>NEUTRAL</p>";
            echo "<script>";
            echo "document.getElementById('emoji-smile').style.display = 'none';";
            echo "document.getElementById('emoji-frown').style.display = 'none';";
            echo "document.getElementById('emoji-meh').style.display = 'inline';";
            echo "document.getElementById('text-good').style.display = 'none';";
            echo "document.getElementById('text-bad').style.display = 'none';";
            echo "</script>";
          } else {
            echo "<p>UNKNOWN</p>";
          }
        }
    
        ?>
  
    </section>
    
    <script src="main.js"></script>
  </body>
  
  
  </html>
  