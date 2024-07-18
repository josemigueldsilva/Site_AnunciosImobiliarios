<?php

    $conexao = new mysqli(
        "127.0.0.1",  
        "root",         
        "",             
        "easyhouse"       
    );

    //Se for encontrado o envio de algo via post...
    if (isset($_POST['usuario']) || isset($_POST['nova_senha']) || isset($_POST['confirma_senha']))
    {
        $usuario = $_POST['usuario'];
        $nova_senha = $_POST['nova_senha'];
        $confirma_senha = $_POST['confirma_senha'];

        if (empty($usuario) || empty($nova_senha) || empty($confirma_senha)) 
        {
            $erro = "Preencha todos os campos.";
        } 
        elseif ($nova_senha != $confirma_senha) 
        {
            $erro = "As senhas não coincidem.";
        } 
        else 
        {
            $sql = "SELECT * FROM login WHERE usuario='$usuario'";
            $resultado = $conexao->query($sql);
            $quantidade = $resultado->num_rows;

            if ($quantidade == 1) 
            {
                $sql = "UPDATE login SET senha='$nova_senha' WHERE usuario='$usuario'";
                if ($conexao->query($sql)) 
                {
                    $sucesso = "Senha alterada com sucesso.";
                } 
                else 
                {
                    $erro = "Erro ao alterar a senha.";
                }
            } 
            else 
            {
                $erro = "E-mail não encontrado.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Esqueci Minha Senha</title>
</head>
<body>
    <div class="esquecisenha__container">
    <a href="index.php">
        <img class="esquecisenha__imagem" src="../img/Logo.png" alt="Logo Easy House"> </a>

        <div class="container__input__login">
            <form method="post" action="">
                <div>
                <label>E-mail <br>
                <input class="esquecisenha__email" type="email" name="usuario" placeholder="Digite seu e-mail"/> </label>
                </div>

                <div>
                <label>Nova Senha <br>
                <input class="esquecisenha__senha" type="password" name="nova_senha" placeholder="Digite sua nova senha"/> </label> 
                </div>

                <div>
                <label>Confirme a Nova Senha <br>
                <input class="esquecisenha__confirmarsenha" type="password" name="confirma_senha" placeholder="Confirme sua nova senha"/> </label>
                </div>

                <?php
                if (!empty($erro)) {
                    echo "<p style='color: red;'>$erro</p>";
                }
                if (!empty($sucesso)) {
                    echo "<p style='color: green;'>$sucesso</p>";
                }
                ?>

                <input class="esquecisenha__botao__entrar" type="submit" value="ALTERAR"/> <a class = "esquecisenha__botao__entrar" href="login.php">Voltar</a>
            </form>
        </div>
    </div>
</body>
</html>
