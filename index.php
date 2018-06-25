<?php

require_once __DIR__. '/vendor/autoload.php';


$ms = new liw\src\MemoryValueStorage();
$j1 = new \liw\src\JsonValueStorage('storage.json');
$m1 = new \liw\src\YamlValueStorage('storage.yaml');

$m1->set('qq','12344gsg');
$m1->set('qq','12344gsg');
$m1->set('hdh','dshdfshdshdfshsd');
$m1->set('537','dsdfhrewyewy');

echo $m1->get('537');

//$m1->remove('hdh');

//$m1->clear();




