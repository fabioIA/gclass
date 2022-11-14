<?php

    if(isset($_POST['submit'])) {

        include_once('config.php');

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf']; 
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        $verify = mysqli_query($conexao, "SELECT cpf FROM professor WHERE cpf = '$cpf'");

        if (mysqli_num_rows($verify) < 1) {
            $result = mysqli_query($conexao, "INSERT INTO professor(cpf, nome_professor, telefone, senha) 
            VALUES ('$cpf', '$nome', '$telefone', '$senha')");

            echo "<script>alert('Cadastrado com sucesso!!')</script>";

        }else {
            echo "<script>alert('Professor já cadastrado')</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../css/deep.css">
</head>
<body>
    <main>
        <h1>Cadastro</h1>

        <fieldset>
            <form action="register.php" method="post">
                <div class="box">
                    <input type="text" name="nome" id="nome" class="Input" autocomplete="off" maxlength="80" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>

                <div class="box">
                    <input type="tel" name="cpf" id="cpf" class="Input" autocomplete="off" maxlength="14" oninput="mascaracpf(this)" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <div class="box">
                    <input type="tel" name="telefone" id="telefone" class="Input" autocomplete="off" maxlength="15" oninput="handlePhone(event)" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div class="box">

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