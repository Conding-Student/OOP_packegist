<?php

require "sentiments/vendor/autoload.php";

use Sentiment\Analyzer; // Added to import the Analyzer class from the Sentiment library

// Abstract class defining a sentiment analysis
abstract class SentimentAnalysis 
{

    // Encapsulated Global Variable
    protected $analyzer;

    //Contructor to initialize new object
    public function __construct() {
        $this->analyzer = new Analyzer();
    }

    // Implementing the abstract method to calculate sentiment
    protected function calculateSentiment($text) {
        return $this->analyzer->getSentiment($text);
    }
}

// Child class inheriting value on the parent class
class SentimentsWithLibrary extends SentimentAnalysis {
    
    public function get_sentiments($input)
    {
        return $this->calculateSentiment($input);
    }
        
    }
