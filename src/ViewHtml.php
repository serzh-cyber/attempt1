<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.07.2019
 * Time: 12:46
 */

namespace App;


class ViewHtml
{
    /**
     * Вывод в браузер
     *
     * @param $arr
     */
    public function viewHtml($arr)
    {
        echo nl2br("Животных в коробке: " . $arr['petsInBox'] . "\n");
        echo nl2br('В коробке собак - ' . $arr['dogsInBox'] . ', кошек - ' . $arr['catsInBox'] . ".\n");
        echo nl2br("В коробке голодных: " . $arr['hungryInBox'] . ", а сытых: " . $arr['fedInBox'] . ".\n");
        echo nl2br("Животных вне коробки: " . $arr['petsOutBox'] . "\n");
        echo nl2br('Вне коробки собак - ' . $arr['dogsOutBox'] . ', кошек - ' . $arr['catsOutBox'] . ".\n");
        echo nl2br("Вне коробки голодных: " . $arr['hungryOutBox'] . ", а сытых: " . $arr['fedOutBox'] . ".\n");
        echo nl2br($arr['clearNeed'] ? 'В коробке нужно прибраться.' . "\n" : 'В коробке убираться не нужно.' . "\n");
    }
}
