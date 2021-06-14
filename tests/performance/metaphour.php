<?php

require __DIR__ . '/../../vendor/autoload.php';

$start = explode(' ',microtime());


$lstSlova = file(__DIR__.'/../../data/words.txt');

global $metaphour;
$metaphour = new \Mav\Slovo\Phonetics\Metaphour();
$metaphourReflection = new ReflectionClass('\Mav\Slovo\Phonetics\Metaphour');


function test ($method, $lstTest, &$lstResult) {
    global $metaphour;
    $startTest = explode(' ',microtime());
    $lstSLOVA = [];
    foreach ($lstTest as $test) $lstResult[] = $method->invoke($metaphour, $test);
    $endTest = explode(' ',microtime());
    
    $resultTime = $endTest[0] + $endTest[1] - $startTest[0] - $startTest[1];
    return $resultTime;
}



// prepare /////////////////////////////////////////////////////////////////////////////////////////////////////////////
$method = $metaphourReflection->getMethod('prepare');
$method->setAccessible(true);
$lstTest = $lstSlova; unset($lstSlova);
$lstSLOVA = [];

echo 'Testing preapre...';
echo "\n", test($method,$lstTest,$lstSLOVA);
echo "\n\n";


// endingCompression /////////////////////////////////////////////////////////////////////////////////////////////////////////////
$method = $metaphourReflection->getMethod('endingCompression');
$method->setAccessible(true);
$lstTest = $lstSLOVA; unset($lstSLOVA);
$lstSLOV = [];

echo 'Testing endingCompression...';
echo "\n", test($method,$lstTest,$lstSLOV);
echo "\n\n";


// vowelsSimpling /////////////////////////////////////////////////////////////////////////////////////////////////////////////
$method = $metaphourReflection->getMethod('vowelsSimpling');
$method->setAccessible(true);
$lstTest = $lstSLOV; unset($lstSLOV);
$lstSLV = [];

echo 'Testing vowelsSimpling...';
echo "\n", test($method,$lstTest,$lstSLV);
echo "\n\n";


// flumping /////////////////////////////////////////////////////////////////////////////////////////////////////////////
$method = $metaphourReflection->getMethod('flumping');
$method->setAccessible(true);
$lstTest = $lstSLV; unset($lstSLV);
$lstSLF = [];

echo 'Testing flumping...';
echo "\n", test($method,$lstTest,$lstSLF);
echo "\n\n";


