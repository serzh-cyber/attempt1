<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:02
 */

namespace App\Animal\Interfacing;


interface IAnimal
{
    /**
     * Голос
     *
     * void голос животного
     */
    public function speak(): void;

    /**
     * Команда ползти
     *
     * void состояние на ползет
     */
    public function crawl(): void;

    /**
     * Команда кушать
     *
     * @return int сытость повышается
     */
    public function eat();
    /**
     * Команда кушать
     *
     * @return int сходить по номеру два
     */
    public function toilet();
}