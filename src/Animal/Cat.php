<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 14:46
 */

namespace App\Animal;


use App\Animal\Abstraction\Animal;

class Cat extends Animal
{
    //protected $type = 0;
    protected $type = 0;

    /**
     * Команда голос
     */
    public function speak(): void
    {
        echo 'Абырвалг' . '<br>';
    }

    /**
     * Команда ползать
     */
    public function crawl(): void
    {
        echo 'Не БУДУ, Не БУДУ' . '<br>';
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }
}