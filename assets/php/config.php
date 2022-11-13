<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'tomaladaca';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conexao -> connect_error) {
        die("Falha na conexão com o BD" . $conexao -> connect_error);
    }
?>