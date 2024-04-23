<?php
  require "Classes/sentiments.php"; // Include the process for sentiment analysis
  require 'Classes/translator.php'; // Include the process for language tranlator 
?>

<?php

  // Intantiating new object using class "Translator"
  $translator = new Translator();

  // Intantiating new object using class "SentimentsWithLibrary"
  $sentimentAnalyzer = new SentimentsWithLibrary();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Text Translator with Sentiment Analysis</title>
  <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>

  <h1>Text Translator with Sentiment Analysis</h1>

  <form method="post">

    <label for="text" class="trans">Text to Translate:</label><br>

    <textarea name="text" id="text" rows="5" cols="30" required></textarea><br>

    <label class="language" for="from">Source Language:</label><br>

    <select name="from" id="from" class="selected">

      <?php //creating an array to be use in the website      
        $languages = array(
          'en' => 'English',
          'fil' => 'Filipino',
          'de' => 'German',
          'es' => 'Spanish',
          'fr' => 'French',
          'la' => 'Latin',
          'pt' => 'Portuguese',
        );
      ?>

      <!-- Creating a loop to display the different language available-->
      <?php foreach ($languages as $code => $name): ?> 
        <option value='<?php echo $code; ?>'><?php echo $name; ?></option>
      <?php endforeach; ?>

    </select><br><br>

    <input type="submit" value="Translate and Analyze" class="analyze">

  </form>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php
    $text = $_POST['text'];
    $from = $_POST['from'];
    $to = 'en'; // Target language is always English

    $translatedText = $translator->translateText($text, $to, $from);
    $sentimentResult = $sentimentAnalyzer->get_sentiments($translatedText);
    $sentiment_score = $sentimentResult["compound"];
    ?>
      <h3>Your input:</h3>
      <p><?php echo $text; ?></p>

      <h3>Translation (to English):</h3>
      <p><?php echo $translatedText; ?></p>

      <h3>Sentiment Analysis:</h3>

      <?php if ($sentiment_score > 0.5): ?>
        <p>POSITIVE</p>

      <?php elseif ($sentiment_score > 0.2): ?>
        <p>SLIGHTLY POSITIVE</p>

      <?php elseif ($sentiment_score < -0.05): ?>
        <p>NEGATIVE</p>

      <?php elseif ($sentiment_score < -0.2): ?>
        <p>SLIGHTLY NEGATIVE</p>

      <?php else: ?>
        <p>NEUTRAL</p>

      <?php endif; ?>

  <?php endif; ?>

</body>
</html>
