<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25.07.2019
 * Time: 14:19
 */

require 'vendor/autoload.php';

$app = new \App\Application();
$cli = new \App\ViewCli();
$amount = new \App\AmountCli();

$app->run($cli, $amount);
