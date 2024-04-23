<?php

// importing file package that came from the packegist.org
require "translator/vendor/autoload.php";
require "sentiments/vendor/autoload.php";
require "Polymorphism.php";

use Sentiment\Analyzer; // Added to import the Analyzer class from the Sentiment library

// Child class inheriting value on the Polymorphism_parent class
class SentimentsWithLibrary extends Polymorphism_parent 
{
    public function __construct() 
    {
        $this->analyzer = new Analyzer();
    }
    
    public function get_sentiments($input)
    {
        return $this->calculateSentiment($input);
    }
        
}

// Children Class inheriting the characteristics of Polymorphism_parent class
class Translator extends Polymorphism_parent 
{
  public function __construct() 
  {   
    $this->translate = new Stichoza\GoogleTranslate\GoogleTranslate();
  }

  public function translateText($text, $from, $to)
  {
    return $this->Inserted_Text($text, $from, $to);
  }
}
