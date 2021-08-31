<?php
require_once __DIR__ . '/../config.php';

//Controller
$fileControler = RAIZ . '/modulos/' . CLASSE . '/' . CLASSE . '.php';
if (file_exists($fileControler)) {
    require_once RAIZ . '/modulos/Controller.php';
    require_once $fileControler;
}

//Classe
$Classe = CLASSE;
if (class_exists($Classe)) {
    $Classe = new $Classe();

    //Metodo
    $Metodo = METODO;
    if (method_exists($Classe, $Metodo)) {
        $Classe->$Metodo();
    }
}
