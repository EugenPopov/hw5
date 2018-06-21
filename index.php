<?php

require_once __DIR__. '/vendor/autoload.php';

use liw\src\MemoryCacheStorage;


/*
$ms = new MemoryCacheStorage();

$ms->set('zaebis','snimay');


$jek = $ms->get('zaebis');

echo $jek.PHP_EOL;
*/

$m1 = new \liw\src\YamlStorage();

//$m1->set('qq','onton');
//$m1->set('we','vEtalik');

echo $m1->has('qq'),PHP_EOL;
echo $m1->get('qq'),PHP_EOL;
