<?php

require __DIR__ . '/../vendor/autoload.php';

$slovo = $argv[1];

if ($slovo) {
    $phonetics = new \Mav\Slovo\Phonetics();
    $SLF = $phonetics->Metaphour($slovo);
    echo $SLF, "\n";
    if ($SLF) {
        $lstSlova = file(__DIR__.'/../data/words.txt');
    
        foreach ($lstSlova as $slovo) {
            if ($phonetics->Metaphour($slovo) == $SLF) {
                echo $slovo, "\n";
            }
        }
    }
    
}
