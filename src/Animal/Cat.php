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
    protected $type = 0;

    public function speak(): void
    {
        echo 'Абырвалг' . '<br>';
    }
    public function crawl(): void
    {
        echo 'Не БУДУ, Не БУДУ' . '<br>';
    }
    public function toilet()
    {
        // TODO: Implement toilet() method.
    }
}