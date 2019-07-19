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

    public function speak(): void
    {
        echo 'Гав, Гав' . '<br>';
    }
    public function crawl(): void
    {
        echo 'ПОЛЗУ, ПОЛЗУ' . '<br>';
    }
    public function toilet()
    {
        // TODO: Implement toilet() method.
    }
}