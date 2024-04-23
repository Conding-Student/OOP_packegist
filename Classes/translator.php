<?php

// Abstracted Parent class
abstract class BaseTranslator {

  // Encapsulated Global Variables
  protected $translate;

  // Contructor to load and initialize the function of google translator
  public function __construct() {
    require "translator/vendor/autoload.php";
    $this->translate = new Stichoza\GoogleTranslate\GoogleTranslate();
  }

  // Encapsulated methods
  protected function Inserted_Text($text, $from, $to) {
    return $this->translate->trans($text, $from, $to);
  }
}

// Children Class inheriting the characteristics of BaseTranslator
class Translator extends BaseTranslator {

  public function translateText($text, $from, $to)
  {
    return $this->Inserted_Text($text, $from, $to);
  }
}

?>
