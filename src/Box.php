<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.07.2019
 * Time: 11:16
 */

namespace App;

use App\Animal\Abstraction\Animal;
use App\Animal\Cat;
use App\Animal\Dog;

class Box
{
    /**
     * Площадь коробки
     */
    const SQUARE = 10000;

    /**
     * Максимально положенное количество экскрементов в коробке
     */
    const CRAP_LIMIT = 300;

    /**
     * @var string цвет коробки
     */
    protected $color = '';

    /**
     * @var array массив содержащий в себе объекты животных, находящихся в коробке
     */
    public $petInBox = [];

    /**
     * @var int текущая площадь занятости коробки
     */
    public $currentSpace = 0;

    /**
     * @var Crap|null объект класса Crap
     */
    protected $boxCrap = null;

    /**
     * Box constructor.
     * @param $color
     */
    public function __construct($color)
    {
        $this->color = $color;
        $this->boxCrap = new Crap();
    }

    /**
     * Добавление животного в коробку
     *
     * @param $array
     */
    public function getPetInBox($array): void
    {
        foreach ($array as $animal) {
            $this->isPlaceEnough($animal);
        }
    }

    /**
     * Вытаскивает животного из коробки
     *
     * @param Animal $animal
     * @return bool
     */
    public function getPetOutOfBox(Animal $animal): bool
    {
        foreach ($this->petInBox as $key => $pet) {
            if ($pet == $animal) {
                unset($this->petInBox[$key]);
                $animal->setOutBox(0);
                $this->freeSpace($animal);
                return true;
            }
        }
        return false;
    }

    /**
     * Проверяет есть ли свободное место, если есть добавляет в массив объект $animal
     *
     * @param Animal $animal
     */
    public function isPlaceEnough(Animal $animal): void
    {
        if ($animal->getSquare()+$this->currentSpace < self::SQUARE && get_class($animal) == Cat::class) {
            $this->petInBox[] = $animal;
            $this->currentSpace = $this->currentSpace + $animal->getSquare();
            $animal->setInbox(1);
            //return $text = 'Кошка ' . $animal->getName() . ' в коробке.' . "\n";
        } elseif ($animal->getSquare()+$this->currentSpace < self::SQUARE && get_class($animal) == Dog::class) {
            $this->petInBox[] = $animal;
            $this->currentSpace = $this->currentSpace + $animal->getSquare();
            $animal->setInbox(1);
        }
    }

    /**
     * Освобождает площадь
     *
     * @param Animal $animal
     */
    public function freeSpace(Animal $animal): void
    {
        $this->currentSpace = $this->currentSpace-$animal->getSquare();
    }

    /**
     * Проверка на необходимость уборки в коробке
     *
     * @return bool
     */
    public function clearRequired(): bool
    {
        if ($this->boxCrap->getCrapInBox() >= self::CRAP_LIMIT) {
            return true;// 'Экскрементов становиться слишком много, заполнилось на ' . $this->boxCrap->getCrapInBox() . ' из ' . self::CRAP_LIMIT . ' - в коробке нуждается в очищении.' . "\n";
            //$this->clearCrap();
        } else {
            return false;// 'Коробка на данный момент в очищении не нуждается. заполнилось на ' . $this->boxCrap->getCrapInBox() . ' из ' . self::CRAP_LIMIT . ".\n";
        }
    }

    /**
     * Очищение коробки от экскрементов
     *
     * @return bool
     */
    public function clearCrap(): bool
    {
        $this->boxCrap->setCrap(0);
        return true;
    }

    /**
     * @return object $this->boxCrap
     */
    public function getBoxCrap(): object
    {
        return $this->boxCrap;
    }
}
