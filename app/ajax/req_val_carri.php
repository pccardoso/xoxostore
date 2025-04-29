<?php

    require_once("../php/Administrador.class.php");

    session_start();
    $result = array(0, "<p>Por favor, realize login!</p>");
    if(isset($_SESSION['usuario'])){
        $result = array(1);
    }

    echo json_encode($result);

?>