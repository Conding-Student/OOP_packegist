<?php

require "sentiments/vendor/autoload.php";

// Abstract class defining a sentiment analysis
abstract class SentimentAnalysis {
    protected $analyzer;
    // Abstract method for calculating sentiment
    abstract public function calculateSentiment($text);
}
