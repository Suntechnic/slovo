<?php

require __DIR__ . '/../vendor/autoload.php';

$lstSlova = $argv;
unset($lstSlova[0]);

if (!is_array($lstSlova) || !count($lstSlova)) $lstSlova = ['слово'];

$phonetics = new \Mazha\Slovo\Phonetics();
foreach ($lstSlova as $slovo) echo $phonetics->Metaphour($slovo), '/', $phonetics->Metaphour($slovo,2,true), "\n";