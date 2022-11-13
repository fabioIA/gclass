<?php

    include_once('config.php');

    if(isset($_POST['submit'])) {

        $sala = $_POST['sala'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $data_fim = $_POST['data'];
        $hora_fim = $_POST['hora'];

        $hoje = date('d-m-Y');

        date_default_timezone_set('Brazil/East');
        $hora = date('H:i', time());

        $request = mysqli_query($conexao, "SELECT cpf FROM professor 
        WHERE cpf = '$cpf' AND senha = '$senha'");

        if(mysqli_num_rows($request) < 1) {
            echo "<script>alert('Cpf ou senha incorretos')</script>";

        }else {
            $historico = mysqli_query($conexao, "UPDATE sala 
            SET data_inicio = '$hoje', hora_inicio = '$hora', data_fim = '$data_fim', hora_fim = '$hora_fim', cpf = '$cpf'
            WHERE cod_sala = $sala");

            echo "<script>alert('Cadastrado com sucesso!!')</script>";

        }
    }

    $salas = mysqli_query($conexao, "SELECT cod_sala FROM sala WHERE cpf IS NULL");
    $response = [];

    while($tupla = mysqli_fetch_assoc($salas)){
        array_push($response, $tupla['cod_sala']);
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
    <main>
        <h1>Reservar</h1>
    
        <fieldset>
            <form action="reservation.php" method="post">
                <div class="box">
                    <input type="tel" name="cpf" id="cpf" class="Input" maxlength="14" oninput="mascaracpf(this)" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <div class="box">
                    <select name="sala" id="sala" class="Input" required>
                        <option value="" data-default disabled selected></option>
                        <?php foreach ($response as $s) { ?>
                            <option value="<?= $s; ?>"> <?= $s; ?></option>
                        <?php } ?>
                    </select>
                    <label for="sala" class="labelInput">Sala</label>
                </div>

                <div class="box">
                    <input type="date" placeholder="Oi" name="data" id="data" class="Input" required>
                    <!-- <label for="data" class="labelInput">Data de devolução</label> -->
                </div>
                
                <div class="box">
                    <input type="time" name="hora" id="hora" class="Input" required>
                    <!-- <label for="hora" class="labelInput">Hora de devolução</label> -->
                </div>

                <div class="box">
                    <input type="password" name="senha" id="senha" class="Input" maxlength="40" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                
                <input type="submit" name="submit" id="submit">
            </form>
        </fieldset>
    </main>

    <script src="../js/script.js"></script>
</body>
</html>