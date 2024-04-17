<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
  
  <form method="post">
    
    <textarea name="text" id="text" rows="5" cols="30"></textarea><br><br>
    <label for="from"></label><br>
    <select name="from" id="from">
      <?php
        require "trial.php"; // Include the Translator class
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
    <input type="submit" value="Translate">
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    $from = $_POST['from'];
    $to = 'en'; // Target language is always English

    $translator = new Translator();
    $translatedText = $translator->translateText($text, $to, $from);

    
    echo "<p>$translatedText</p>";
  }
  ?>
</body>
</html>
