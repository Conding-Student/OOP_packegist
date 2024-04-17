<?php

require "vendor/autoload.php";

// Abstract class defining a sentiment analysis
abstract class SentimentAnalysis {
    // Abstract method for calculating sentiment
    abstract public function calculateSentiment($text);
}
