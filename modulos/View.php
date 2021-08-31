<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jquery -->
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>

<!-- datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.9/datatables.min.css" />
<script src="https://cdn.datatables.net/v/dt/dt-1.10.25/r-2.2.9/datatables.min.js"></script>

<?php

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
//Não existe classe
else {
    header('Location: ' . MODULO_INICIAL);
}
