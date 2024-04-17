<?php

require 'abstraction.php'; // Added a semicolon here

use Sentiment\Analyzer; // Added to import the Analyzer class from the Sentiment library

// Concrete class implementing SentimentAnalysis using the Sentiment library
class SentimentsWithLibrary extends SentimentAnalysis {
    private $analyzer;

    public function __construct() {
        $this->analyzer = new Analyzer();
    }

    // Implementing the abstract method to calculate sentiment
    public function calculateSentiment($text) {
        return $this->analyzer->getSentiment($text);
    }
}

?>
