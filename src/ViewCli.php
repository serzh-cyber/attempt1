<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 16:50
 */

namespace App;

use App\Interfacing\View;

class ViewCli implements View
{
    /**
     * Вывод в cli
     *
     * @param $arr
     */
    public function viewer(array $arr)
    {
        echo "Животных в коробке: "     . $arr['petsInBox']     . "\n";
        echo 'В коробке собак - '       . $arr['dogsInBox']     . ', кошек - '  . $arr['catsInBox']         . ".\n";
        echo "В коробке голодных: "     . $arr['hungryInBox']   . ", а сытых: " . $arr['fedInBox']          . ".\n";
        echo "Животных вне коробки: "   . $arr['petsOutBox']    . "\n";
        echo 'Вне коробки собак - '     . $arr['dogsOutBox']    . ', кошек - '  . $arr['catsOutBox']        . ".\n";
        echo "Вне коробки голодных: "   . $arr['hungryOutBox']  . ", а сытых: " . $arr['fedOutBox']         . ".\n";
        echo $arr['clearNeed'] ? 'В коробке нужно прибраться.'  . "\n" : 'В коробке убираться не нужно.'    . "\n";
    }
}
