<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.07.2019
 * Time: 15:02
 */

namespace App\Animal\Interfacing;


use App\Box;
use App\Feed;

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
     * Покормить питомца
     *
     * @param Feed $feed
     */
    public function eat(Feed $feed): void;

    /**
     * Команда туалет
     *
     * @param Box $box
     * @return mixed
     */
    public function toilet(Box $box): void;
}