<?php
    session_start();
    unset($_SESSION['itens']);

    echo json_encode(array(1, "Carrinho removido com sucesso!"));
?>