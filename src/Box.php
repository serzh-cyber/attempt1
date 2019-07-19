<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.07.2019
 * Time: 11:16
 */

namespace App;


class Box
{
    const SQUARE = 10000; //const VOLUME = 1000000;
    const limitOfWaste = 200;
    protected $color = '';
    public $petInBox = [];
    public $currentSpace = 0;
    protected $crap = 0;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getPetInBox($array)
    {
        foreach ($array as $animal) {
            $this->isPlaceEnough($animal);
            //echo $text;

        }
    }
    public function isPlaceEnough($animal)
    {
        //while($this->currentSpace<$self::SQUARE){} echo $text = 'Not enough space';
        if($animal->volume/20+$this->currentSpace < self::SQUARE && $animal->type == 0) {
            $this->petInBox[] = $animal;
            $this->currentSpace = $this->currentSpace + $animal->volume/20;
            //return $text = 'Животное в коробке';

        } elseif ($animal->volume/30+$this->currentSpace < self::SQUARE && $animal->type == 1) {
            $this->petInBox[] = $animal;
            $this->currentSpace = $this->currentSpace + $animal->volume/30;
            //return $text = 'Животное в коробке';
        } else {
            //return $text = 'Not enough free space';
        }
    }

    public function inBoxInformation()
    {
        return count($this->inBox);
    }
}