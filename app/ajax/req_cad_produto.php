<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    if($_POST['sGraPro'] == 1){

        echo json_encode($adm->pro->cadastrar(array(
            "ePp" => $_POST['ePp'],
            "eP" => $_POST['eP'],
            "eM" => $_POST['eM'],
            "eG" => $_POST['eG'],
            "eGg" => $_POST['eGg'],
            "sGraPro" => $_POST['sGraPro'],
            "eNomPro" => $_POST['eNomPro'],
            "eDesPro" => $_POST['eDesPro'],
            "sDepPro" => $_POST['sDepPro'],
            "eValCus" => $_POST['eValCus'],
            "eValAta" => $_POST['eValAta'],
            "eValVar" => $_POST['eValVar'],
        )));

    }else{

        echo json_encode($adm->pro->cadastrar(array(
            "e34" => $_POST['e34'],
            "e36" => $_POST['e36'],
            "e38" => $_POST['e38'],
            "e40" => $_POST['e40'],
            "e42" => $_POST['e42'],
            "e44" => $_POST['e44'],
            "e46" => $_POST['e46'],
            "sGraPro" => $_POST['sGraPro'],
            "eNomPro" => $_POST['eNomPro'],
            "eDesPro" => $_POST['eDesPro'],
            "sDepPro" => $_POST['sDepPro'],
            "eValCus" => $_POST['eValCus'],
            "eValAta" => $_POST['eValAta'],
            "eValVar" => $_POST['eValVar'],
        )));

    }

    

?>