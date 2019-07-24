<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.07.2019
 * Time: 11:16
 */

namespace App;

use App\Animal\Abstraction\Animal;

class Box
{
    const SQUARE = 10000; //const VOLUME = 1000000;
    const CRAP_LIMIT = 300;
    protected $color = '';
    public $petInBox = [];
    public $currentSpace = 0;
    protected $boxCrap = null;

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
            $text = $this->isPlaceEnough($animal);
            echo $text;
        }
    }

    /**
     * Вытаскивает животного из коробки
     *
     * @param Animal $animal
     */
    public function getPetOutOfBox(Animal $animal): void
    {
        foreach ($this->petInBox as $key => $pet) {
            if ($pet == $animal) {
                unset($this->petInBox[$key]);
                $animal->setOutBox(0);
                $this->freeSpace($animal);
                echo 'Животное ' . $animal->getName() . ' было вытащено из коробки.' . "\n";
                return;
            }
        }
        echo 'Такого животного в коробке нет.' . "\n";
    }

    /**
     * Проверяет есть ли свободное место, если есть добавляет в массив объект $animal
     *
     * @param Animal $animal
     * @return string
     */
    public function isPlaceEnough(Animal $animal): string
    {
        if ($animal->getSquare()+$this->currentSpace < self::SQUARE && $animal->getType() == 0) {
            $this->petInBox[] = $animal;
            $this->currentSpace = $this->currentSpace + $animal->getSquare();
            $animal->setInbox(1);
            return $text = 'Кошка ' . $animal->getName() . ' в коробке.' . "\n";

        } elseif ($animal->getSquare()+$this->currentSpace < self::SQUARE && $animal->getType() == 1) {
            $this->petInBox[] = $animal;
            $this->currentSpace = $this->currentSpace + $animal->getSquare();
            $animal->setInbox(1);
            return $text = 'Собакен ' . $animal->getName() . ' в коробке.' . "\n";
        } else {
            return $text = 'Не достаточно места в коробке для ' . $animal->getName() . ".\n";
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
     * Информация о коробке
     */
    public function inBoxInformation(): void
    {
        echo 'В коробке находится: ' . count($this->petInBox) . ' животных, коробка заполнена на: ' . $this->currentSpace . ' из 10000.' . "\n";
    }

    /**
     * Проверка на необходимость уборки в коробке
     */
    public function clearRequired(): void
    {
        if ($this->boxCrap->getCrapInBox() >= self::CRAP_LIMIT) {
            echo 'Экскрементов становиться слишком много, заполнилось на ' . $this->boxCrap->getCrapInBox() . ' из ' . self::CRAP_LIMIT . ' - в коробке нуждается в очищении.' . "\n";
            $this->clearCrap();
        } else {
            echo 'Коробка на данный момент в очищении не нуждается. заполнилось на ' . $this->boxCrap->getCrapInBox() . ' из ' . self::CRAP_LIMIT . ".\n";
        }
    }

    /**
     * Очищение корзины от экскрементов
     */
    public function clearCrap(): void
    {
        $this->boxCrap->setCrap(0);
        echo 'Коробка очищена';
    }

    /**
     * @return object $this->boxCrap
     */
    public function getBoxCrap(): object
    {
        return $this->boxCrap;
    }
}
