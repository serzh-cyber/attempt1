<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 14:49
 */

namespace App\Animal;

use App\Animal\Abstraction\Animal;

class Dog extends Animal
{
    protected $type = 1;

    /**
     * Команда голос
     */
    public function speak(): void
    {
        echo 'Гав, Гав' . "\n";
    }

    /**
     * Команда ползать
     */
    public function crawl(): void
    {
        echo 'ПОЛЗУ, ПОЛЗУ' . "\n";
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }
}
