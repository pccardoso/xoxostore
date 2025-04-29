<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();
    $res = $adm->pro->consultar("WHERE tb_produto.id_tb_produto=".$_POST['eIdPro']);

    $dis = 0;

    if($_POST['eTamPro'] == "PP" && $res['0']['pp_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "P" && $res['0']['p_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "M" && $res['0']['m_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "G" && $res['0']['g_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "GG" && $res['0']['gg_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "34" && $res['0']['34_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "36" && $res['0']['36_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "38" && $res['0']['38_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "40" && $res['0']['40_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "42" && $res['0']['42_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "44" && $res['0']['44_tb_grade'] != 0){
        $dis = 1;
    }

    if($_POST['eTamPro'] == "46" && $res['0']['46_tb_grade'] != 0){
        $dis = 1;
    }

    echo json_encode(array("result" => $dis));

?>