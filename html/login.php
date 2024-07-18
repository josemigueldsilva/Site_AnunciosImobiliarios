<?php

    $conexao = new mysqli(
        "127.0.0.1",  
        "root",         
        "",             
        "easyhouse"       
    );

    //Se existir envio de usuário ou senha via post...
    if(isset($_POST['usuario']) || isset($_POST['senha'])) 
    {
        //Se o campo de email estiver estiver vazio.
        if(empty($_POST['usuario'])) 
        {
            $erro = "Preencha seu e-mail";
        } 
        else if(empty($_POST['senha']))
        {
            $erro = "Preencha sua senha";
        }
        else
        {

            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM login WHERE usuario='$usuario' AND senha='$senha'";
            $resultado = $conexao->query($sql);

            //Retorna quantas linhas essa consulta retornou
            $quantidade = $resultado->num_rows;

            if ($quantidade == 1) 
            {
                $tabela = $resultado->fetch_assoc();

                //Se não existir sessão
                if(!isset($_SESSION))
                {
                    session_start(); //Começa nova sessão
                }
                
                // Armazenar dados do usuário na sessão
                $_SESSION['id'] = $tabela['id'];
                $_SESSION['nome'] = $tabela['nome'];
                
                header("Location: anunciar.php");
            } 
            else 
            {
                $erro = "Usuário e/ou senha inválidos";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">

    <title>Entrar</title>
</head>
<body>
    <section class="login__container">
        <div>
            <a href="index.php">
            <img class="login__imagem" src="../img/Logo.png" alt="Logo Easy House"> </a>
        </div>

        <div>
            <p class="login__texto">Ao me logar, aceito os <strong class="login__texto__destaque"> Termos de uso </strong> 
            e <strong class="login__texto__destaque"> Política de <br> privacidade  </strong> do Grupo EASY HOUSE, receber comunicações do <br>  
            EASY HOUSE e afirmo ter 18 anos ou mais.</p>
        </div>

        <form method="post">
            <div>
                <label class="input__email">Usuário </br> 
                <input class="login__email" type="email" name="usuario" placeholder="ex: chen@hotmail.com"/> </label>
            </div>

            <div>
                <label class="input__senha">Senha </br> 
                <input class="login__senha" type="password"  name="senha" placeholder="ex: Taiwan_1234"/> </label>
            </div>

                <?php
                    //Verificando se a variável erro não está vazia
                    if(!empty($erro))
                    {
                        //Se tiver valor dentro dela, essa mensagem é exibida
                        echo "<p style='color: red;'>$erro</p>";
                    }
                ?>

            <div>
                <input class="login__botao__entrar" type="submit" value="ENTRAR"/> <a class = "login__botao__entrar" href="index.php">Voltar</a>
            </div>


            <div>   
                <a class="link__esquecisenha" href="esquecisenha.php">Esqueci Minha Senha</a>
                <p class="link__cadastrar">Não possui uma conta? <a href="cadastrar.php">Cadastra-se aqui<a><p>
            </div>                    
        </form>
    </section>
</body>
</html>