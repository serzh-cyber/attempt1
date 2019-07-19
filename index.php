<?php

require 'vendor/autoload.php';

$dog = new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000);

$cat = new \App\Animal\Cat('Cot', 2, 'f', 'red', 'koshak', 100, 300, 20000);

$animals = [
    $dog,
    $cat,
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 40000),

];

$box = new \App\Box('Red');

$box->getPetInBox($animals);

var_dump($box->petInBox);

echo $box->currentSpace;