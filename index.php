<?php

require 'vendor/autoload.php';

$app = new \App\Application();
$html = new \App\ViewHtml();
$html->viewHtml($app->run());
