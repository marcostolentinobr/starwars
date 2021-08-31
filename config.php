<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

//TITULO
define('TITULO', 'swapi.dev');

//MODULO_INICIAL
define('MODULO_INICIAL', 'Starwars');

//Functions
require_once __DIR__ . '/libs/functions.php';

//init
init();

//Menu
define('MENU', [
    URL . 'Starwars'   => 'Star Wars'
]);
