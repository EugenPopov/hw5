<?php

require_once __DIR__. '/vendor/autoload.php';

use liw\src\MemoryCacheStorage;


/*
$ms = new MemoryCacheStorage();



$jek = $ms->get('zaebis');

echo $jek.PHP_EOL;
*/

$m1 = new \liw\src\YamlStorage();


/*
echo $m1->has('qq'),PHP_EOL;
echo $m1->get('qq'),PHP_EOL;



*/
$j1 = new \liw\src\JsonStorage();

//$j1->set('ye','asfgas');
//$j1->set('hy','asgasgasa');

//$j1->set('er','Dfaf');

//echo $j1->get('er');

echo $j1->has('er');

$j1->clear('ye');
