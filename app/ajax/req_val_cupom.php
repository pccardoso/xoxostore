<?php

    require_once("../php/Administrador.class.php");

    session_start();

    $adm = new Administrador();
    $result = $adm->cup->validarCupom(array("eIdUsuario"=>$_SESSION['usuario'][0]['id_tb_usuario'],"eCupDes" => $_POST['eCupDes'] ));

    if($result[0] == 1){
        $_SESSION['usuario'][1] = $result[2];
    }

    echo json_encode($result);

?>