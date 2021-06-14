<?php

require __DIR__ . '/../vendor/autoload.php';

$transliterator = new \Mav\Slovo\Transliterator();
var_export($transliterator->getTable());