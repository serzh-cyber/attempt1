<?php

require 'vendor/autoload.php';

$dog = new \App\Animal\Dog('Дог', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(800, 1100));
$cat = new \App\Animal\Cat('Мурзик', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 800));

$animals = [
    new \App\Animal\Cat('Котэ', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Дог', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
    new \App\Animal\Cat('Cot', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Pyos', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
    new \App\Animal\Cat('Котастрофа', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Собак', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
    new \App\Animal\Cat('Котопес', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Собадин', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
    new \App\Animal\Cat('Кёт', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Жучка', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
    new \App\Animal\Cat('Снежок', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Каспер', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
    new \App\Animal\Cat('КисКис', 2, 'f', 'red', 'koshak', rand(50, 150), 300, rand(400, 850)),
    new \App\Animal\Dog('Свен', 5, 'm', 'green', 'pitbulterriyer', rand(50, 150), 300, rand(700, 1200)),
];

$box = new \App\Box('Red');
$feed = new \App\Feed();

$box->getPetInBox($animals);
echo '<hr>';
#var_dump($box->petInBox[2]);
#echo $box->currentSpace . '<br>';
$box->getPetOutOfBox($animals[3]);
#var_dump($animals[2]);
#echo $box->currentSpace . '<br>';
echo '<hr>';
echo $box->inBoxInformation()  . '<br>';
$count = 0;
$countBoxDog = 0;
$countBoxCat = 0;
$countDog = 0;
$countCat = 0;
foreach ($animals as $pet) {
    if($pet->getInBox() == 1) {
        if($pet->getType() == 1) {
            $countBoxDog++;
        } else {
            $countBoxCat++;
        }
    } else {
        if($pet->getType() == 1) {
            $countDog++;
        } else {
            $countCat++;
        }
    }
}
echo 'В коробке собак - ' . $countBoxDog . ', кошек - ' . $countBoxCat . '.<br>';
foreach ($animals as $pet) {
    if($pet->getInBox() == 1) {
        $pet->eat($feed);
        $pet->isHungry();
        echo '<hr>';
    }
}
echo 'Животных вне корбки осталось - ' . ($countCat+$countDog) .  '. Из них кошек - ' . $countCat . ', собак - ' . $countDog . '.<br>';
foreach ($animals as $pet) {
    if($pet->getInBox() == 0) {
        $pet->eat($feed);
        $pet->isHungry();
        echo '<hr>';
    }
}
foreach ($animals as $pet) {
    $pet->toilet($box);
    echo '<hr>';
    //echo а$box->getBoxCrap()->getCrapInBox();
}
    $box->clearRequired();
/*
var_dump($dog);
$dog->eat($feed);
var_dump($dog);
$dog->eat($feed);
var_dump($dog);
$dog->isHungry();
print_r($box->petInBox);
 */