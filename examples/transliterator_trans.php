<?php

require __DIR__ . '/../vendor/autoload.php';

$lstSlova = $argv;
unset($lstSlova[0]);

if (!is_array($lstSlova) || !count($lstSlova)) $lstSlova = ['слово'];

$transliterator = new \Mazha\Slovo\Transliterator();
foreach ($lstSlova as $slovo) echo $transliterator->trans($slovo), "\n";