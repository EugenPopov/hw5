<?php

require_once __DIR__. '/vendor/autoload.php';

use liw\src\MemoryValueStorage;


$ms = new MemoryValueStorage();

$ms->set('rt','first');
$ms->set('qq','second');

echo $ms->get('qq'),PHP_EOL;
echo $ms->has('qq'),PHP_EOL;


$m1 = new \liw\src\YamlValueStorage();

$m1->set('1','qwerty');
$m1->set('ty','hshsgfhfs');
$m1->set('23','vet');
$m1->set('rty','antonio');


echo $m1->get('1'),PHP_EOL;


$m1->remove('23');
echo $m1->has('1'),PHP_EOL;
$m1->clear();




$j1 = new \liw\src\JsonValueStorage();

$j1->set('ye','asfgas');
$j1->set('hy','asgasgasa');

$j1->set('er','Dfaf');

echo $j1->get('ghjgh'),PHP_EOL;

echo $j1->has('er');

$j1->clear('ye');


