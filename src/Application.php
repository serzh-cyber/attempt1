<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 14:45
 */

namespace App;


class Application
{
    public function startApplication()
    {
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
        $box->getPetOutOfBox($animals[3]);
        echo '<hr>';
        echo $box->inBoxInformation()  . "\n";
        $countBoxDog = 0;
        $countBoxCat = 0;
        $countDog = 0;
        $countCat = 0;
        foreach ($animals as $pet) {
            if ($pet->getInBox() == 1) {
                if ($pet->getType() == 1) {
                    $countBoxDog++;
                } else {
                    $countBoxCat++;
                }
            } else {
                if ($pet->getType() == 1) {
                    $countDog++;
                } else {
                    $countCat++;
                }
            }
        }
        echo 'В коробке собак - ' . $countBoxDog . ', кошек - ' . $countBoxCat . ".\n";
        foreach ($animals as $pet) {
            if ($pet->getInBox() == 1) {
                $pet->eat($feed);
                $pet->eat($feed);
                $pet->isHungry();
                echo '<hr>';
            }
        }
        echo 'Животных вне корбки осталось - ' . ($countCat+$countDog) .  '. Из них кошек - ' . $countCat . ', собак - ' . $countDog . ".\n";
        foreach ($animals as $pet) {
            if ($pet->getInBox() == 0) {
                $pet->eat($feed);
                $pet->isHungry();
                echo '<hr>';
            }
        }
        foreach ($animals as $pet) {
            $pet->toilet($box);
            echo '<hr>';
        }
        $box->clearRequired();
    }
}