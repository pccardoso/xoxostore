<?php

/*$uploaddir = '../img/upload/';
$uploadfile = $uploaddir . basename($_FILES['eFotPro']['name']);

if (move_uploaded_file($_FILES['eFotPro']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}

echo 'Aqui está mais informações de debug:';*/
echo "<pre>";
print_r($_FILES['eFotPro']);

print "</pre>";

?>