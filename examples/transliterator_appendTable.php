<?php

require __DIR__ . '/../vendor/autoload.php';

$slovo = 'пара слов';

$transliterator = new \Mazha\Slovo\Transliterator();

echo $transliterator->appendTable([
        ' ' => '_',
        "\n" => '_',
        "\t" => '_',
    ])->trans($slovo);