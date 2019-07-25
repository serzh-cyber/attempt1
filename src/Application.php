<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 14:45
 */

namespace App;


use App\Animal\Dog;

class Application
{
    /**
     * Выполнение логики
     *
     * @return array массив из значений, которые нужно вывести
     */
    public function run()
    {
        $arrStr = [];
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
        $box->getPetOutOfBox($animals[3]);
        $countBoxDog = 0;
        $countBoxCat = 0;
        $countDog = 0;
        $countCat = 0;
        foreach ($animals as $pet) {
            if ($pet->getInBox() == 1) {
                if (get_class($pet) == Dog::class) {
                    $countBoxDog++;
                } else {
                    $countBoxCat++;
                }
            } else {
                if (get_class($pet) == Dog::class) {
                    $countDog++;
                } else {
                    $countCat++;
                }
            }
        }
        $arrStr['petsInBox'] = count($box->petInBox);
        $arrStr['dogsInBox'] = $countBoxDog;
        $arrStr['catsInBox'] = $countBoxCat;
        $countHungry = 0;
        foreach ($animals as $pet) {
            if ($pet->getInBox() == 1) {
                $pet->eat($feed);
                if ($pet->isHungry()) {
                    $countHungry++;
                }
            }
        }
        $arrStr['hungryInBox'] = $countHungry;
        $arrStr['fedInBox'] = $countBoxCat+$countBoxDog-$countHungry;
        $countHungry = 0;
        foreach ($animals as $pet) {
            if ($pet->getInBox() == 0) {
                $pet->eat($feed);
                if ($pet->isHungry()) {
                    $countHungry++;
                }
            }
        }
        $arrStr['petsOutBox'] = $countCat+$countDog;
        $arrStr['dogsOutBox'] = $countCat;
        $arrStr['catsOutBox'] = $countDog;
        $arrStr['hungryOutBox'] = $countHungry;
        $arrStr['fedOutBox'] = $countCat+$countDog-$countHungry;
        foreach ($animals as $pet) {
            $pet->toilet($box);
        }
        if($box->clearRequired()) {
            $arrStr['clearNeed'] = true;
        } else {
            $arrStr['clearNeed'] = false;
        }
        return $arrStr;
    }
}
