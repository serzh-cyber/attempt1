<?php

require 'vendor/autoload.php';

$dog = new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', 100, 300, 400);

$dog->speak();

#var_dump($dog);
