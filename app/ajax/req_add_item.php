<?php

    session_start();

    $atua = false;

    foreach ($_SESSION['itens'] as $key => $value) {
        
        if ($value['eIdPro'] == $_POST['eIdPro']) {

            $_SESSION['itens'][$key]['eGraPro'][$_POST['eTamPro']] = $value['eGraPro'][$_POST['eTamPro']] + $_POST['eQuaPro'];

            $_SESSION['itens'][$key]['eQuaPro'] = array_sum($_SESSION['itens'][$key]['eGraPro']);
            
            $atua = true;
        }

    }

    if (!$atua) {
        # code...

        $tam = array("PP" => 0,"P" => 0,"M" => 0,"G" => 0,"GG" => 0,"34" => 0,"36" => 0,"38" => 0,"40" => 0,"42" => 0,"44" => 0,"46" => 0);

        foreach ($tam as $key => $value) {
            if ($key == $_POST['eTamPro']) {
                $tam[$key] = $_POST['eQuaPro'];
            }
        }


        $_SESSION['itens'][] = array(   "eIdPro" => $_POST["eIdPro"],
                                    "eNomPro" => $_POST['eNomPro'],
                                    "ePrePro" => $_POST['ePrePro'],
                                    "eQuaPro" => $_POST['eQuaPro'],
                                    "eGraPro" => $tam,
                                    "eImgPro" => $_POST['eImgPro']
                                );


    }

?>