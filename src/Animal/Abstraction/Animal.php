<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:00
 */

namespace App\Animal\Abstraction;


use App\Animal\Interfacing\IAnimal;

abstract class Animal implements IAnimal
{
    protected $name = '';
    protected $gender = '';
    protected $age = '';
    protected $color = '';
    protected $satiety = '';
    protected $satietyMax = ''; //будем забивать вручную через __construct
    protected $breed = '';
    public $volume = ''; // был protected
    protected $square = '';
    protected $inBox = 0;

    public function __construct($name, $age, $gender, $color, $breed, $satiety, $satietyMax, $volume)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->color = $color;
        $this->breed = $breed;
        $this->satiety = $satiety;
        $this->satietyMax = $satiety;
        $this->volume = $volume;
        $this->getSquare($this->volume);
    }

    /**
     * Вычисление площади
     *
     * @param $volume int объем
     *
     * @return int
     */
    public function getSquare($volume): int
    {
        return $this->square = $volume/30;
    }
    public function eat()
    {
        //аргумент корм, рандомное количество корма прибавляем к
        //$this->name съел столько-то
    }
    abstract public function speak(): void;
    abstract public function crawl(): void;
    public function toilet()
    {
        //если что можно от насыщения отнять количество каки
    }

}