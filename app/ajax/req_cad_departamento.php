<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();
    echo json_encode($adm->dep->cadastrar(array(
        "eNomDep" => $_POST['eNomDep'],
        "eDesDep" => $_POST['eDesDep']
    )));

?>