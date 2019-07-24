<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.07.2019
 * Time: 9:34
 */

namespace App;


use App\Animal\Abstraction\Animal;

class Feed
{
    //protected $feedAmount = '';

    /**
     * Количество корма для животного
     *
     * @param Animal $animal
     * @return int
     */
    public function getFeed(Animal $animal)
    {
        return $animal->getSatietyMax() - $animal->getSatiety() + 40;
    }
}

