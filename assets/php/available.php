<?php

    include_once('config.php');  

    $historico = "SELECT cod_sala FROM sala WHERE cpf IS NULL";
    $result = mysqli_query($conexao, $historico);

    echo "<main><h1>Salas disponíveis</h1><fieldset><div id='tabela'><table></div></fieldset></main>";

    while($tupla = mysqli_fetch_assoc($result)){
        echo "<tr><td>" . $tupla['cod_sala'] . "</td></tr>";

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/deep.css">
</head>
<body>
</body>
</html>