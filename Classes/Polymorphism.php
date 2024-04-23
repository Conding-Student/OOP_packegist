<?php

abstract class Polymorphism_parent
{

    // Encapsulated Global Variable
    protected $analyzer;
    protected $translate;

    //Contructor to initialize new object
    public function __construct() 
    {
        
    }

    // Implementing the abstract method to calculate sentiment
    protected function calculateSentiment($text) 
    {
        return $this->analyzer->getSentiment($text);
    }

    // Implementing the abstract method to translate language
    protected function Inserted_Text($text, $from, $to) 
    {
        return $this->translate->trans($text, $from, $to);
    }
}