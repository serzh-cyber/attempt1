<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:00
 */

namespace App\Animal\Abstraction;

use App\Animal\Interfacing\IAnimal;
use App\Box;
use App\Feed;

abstract class Animal implements IAnimal
{
    protected $name = '';
    protected $gender = '';
    protected $age = '';
    protected $color = '';
    protected $satiety = 0;
    protected $satietyMax = 0;
    protected $breed = '';
    protected $square = '';
    protected $inBox = 0;

    public function __construct($name, $age, $gender, $color, $breed, $satiety, $satietyMax, $square)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->color = $color;
        $this->breed = $breed;
        $this->satiety = $satiety;
        $this->satietyMax = $satietyMax;
        $this->square = $square;
    }

    /**
     * Команда голос
     */
    abstract public function speak(): void;

    /**
     * Команда ползать
     */
    abstract public function crawl(): void;

    /**
     * Покормить питомца
     *
     * @param Feed $feed Корм
     */
    public function eat(Feed $feed) :void
    {
        $f = rand(0, $feed->getFeed($this));
        $this->satiety = $this->satiety+$f;
        echo $this->name . ' съел ' . $f . ' гр. корма.' . "\n";  //$this->name съел столько-то
    }

    /**
     * Проверка на сытость
     */
    public function isHungry(): void
    {
        if ($this->satiety+20 >= $this->satietyMax) {
            echo 'Животное ' . $this->name . ' сыто и валяется без задних ног' . "\n";
        } else {
            echo 'Животное ' . $this->name . ' не сыто' . "\n";
        }
    }

    /**
     * Команда туалет
     *
     * @param Box $box коробка в которую пойдут в туалет
     */
    public function toilet(Box $box = null): void
    {
        if ($this->satiety+20 >= $this->satietyMax) {
            if ($this->inBox == 1) {
                $this->toiletInBox($box);
            } else {
                $this->toiletOutside();
            }
        } else {
            echo 'Животное ' . $this->name . ' не дошла до кондиции' . "\n";
        }
    }

    /**
     * Команда туалет в коробку
     *
     * @param Box $box коробка в которую пойдут в туалет
     */
    public function toiletInBox(Box $box): void
    {
        $this->satiety -= 50;
        $box->getBoxCrap()->setCrap($box->getBoxCrap()->getCrapInBox()+50);
        echo 'Животное ' . $this->name . ' сходила по номеру два внутри коробки.' . "\n";
    }

    /**
     * Команда туалет снаружи для тех кто не в коробке
     */
    public function toiletOutside(): void
    {
        $this->satiety -= 50;
        echo 'Животное ' . $this->name . ' сходила по номеру два.' . "\n";
    }

    /**
     * @return int
     */
    public function getSquare(): int
    {
        return $this->square;
    }

    /**
     * @return int
     */
    public function getInBox(): int
    {
        return $this->inBox;
    }

    /**
     * @param int $inBox
     */
    public function setInBox(int $inBox): void
    {
        $this->inBox = $inBox;
    }

    /**
     * @param int $inBox
     */
    public function setOutBox(int $inBox): void
    {
        $this->inBox = $inBox;
    }

    /**
     * @return int
     */
    public function getSatiety(): int
    {
        return $this->satiety;
    }

    /**
     * @return int
     */
    public function getSatietyMax(): int
    {
        return $this->satietyMax;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
