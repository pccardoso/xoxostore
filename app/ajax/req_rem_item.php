<?php

    session_start();

    foreach ($_SESSION['itens'] as $key => $value) {
        if($value['eIdPro'] == $_POST['eIdPro']){
            unset($_SESSION['itens'][$key]);
        }
    }

?>