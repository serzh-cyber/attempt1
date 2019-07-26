<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.07.2019
 * Time: 15:38
 */

namespace App;

use App\Interfacing\IAmount;

class AmountCli implements IAmount
{
    /**
     * Получить входные данные для CLI
     *
     * @return array
     */
    public function getAmount(): array
    {
        $longopts = [
            "puppy_count:",
            "kitty_count:",
        ];
        $options = getopt("", $longopts);
        return $options;
    }
}