<?php

require __DIR__ . '/../vendor/autoload.php';

$lstSlova = ['слово', 'пара слов', 'ещё три слова'];

$transliterator = new \Mazha\Slovo\Transliterator();

foreach ($lstSlova as $slovo) echo $transliterator->trans($slovo), "\n";

echo 'Set new table:', "\n";

var_export($transliterator->setTable([
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'о' => 'o',
        'с' => 's',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya'
    ])->getTable());

echo "\n";

foreach ($lstSlova as $slovo) echo $transliterator->trans($slovo), "\n";