<?php

class Translator {

  private $translate;

  public function importTranslate() {
    require "translator/vendor/autoload.php";
    $this->translate = new Stichoza\GoogleTranslate\GoogleTranslate();
  }

  public function translateText($text, $from, $to) {
    return $this->translate->trans($text, $from, $to);
  }
}
