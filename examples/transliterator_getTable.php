<?php

require __DIR__ . '/../vendor/autoload.php';

$transliterator = new \Mazha\Slovo\Transliterator();
var_export($transliterator->getTable());