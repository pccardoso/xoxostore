<?php
    
    require_once("../php/Administrador.class.php");

    session_start();

    $adm = new Administrador();

    $result = $adm->usu->login(array(
        "eEmail" => $_POST['eEmailLogin'],
        "eSenha" => $_POST['eSenhaLogin']
    ));

    if($result[0]){

        if (isset($_SESSION['usuario'])) {
            $_SESSION['usuario'] = $result[2];
        }else{
            $_SESSION['usuario'] = $result[2];
        }

    }

    echo json_encode($result);

?>