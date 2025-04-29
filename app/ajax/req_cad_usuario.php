<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();
    echo json_encode($adm->usu->cadastrar(array(
        "eNome" => $_POST['eNome'],
        "eEmail" => $_POST['eEmail'],
        "eContato" => $_POST['eContato'],
        "eSenha" => $_POST['eSenha']
    )));

?>