<?php

use function Controllers\Word\triedLetter as triedLetter;
use function Controllers\Word\triedWord as triedWord;

require 'bootstrap.php';
require 'models/word.php';

session_start();

include('configs/config.php');

$pdo = Connection::make();

$route = require 'utils/router.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    triedLetter($pdo);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    triedWord();
}

$data = call_user_func($route['callback'],$pdo);
extract($data,EXTR_OVERWRITE);

// Require the views
require("views/{$view}");