<?php

require "translator/vendor/autoload.php";

use Stichoza\GoogleTranslate\GoogleTranslate;

echo GoogleTranslate::trans('Mahal kita', 'en', 'fil'); // Filipino to english
echo GoogleTranslate::trans('Ich liebe meine oma', 'en', 'de'); // German to English