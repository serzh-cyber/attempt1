<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:55
 */

namespace App;

use App\Interfacing\IAmount;

class AmountHtml implements IAmount
{
    /**
     * Получить входные данные для HTML
     *
     * @return array
     */
    public function getAmount(): array
    {
        $amount = [];
        if ($_GET['puppy_count']) {
            $amount = $_GET['puppy_count'];
        }
        if ($_GET['cat_count']) {
            $amount = $_GET['kitty_count'];
        }
        return $amount;
    }
}