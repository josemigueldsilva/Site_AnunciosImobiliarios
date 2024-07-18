<?php
    session_start();

    $conexao = new mysqli(
        "127.0.0.1", 
        "root", 
        "", 
        "easyhouse"
    );

    if (isset($_SESSION['id_ADM'])) 
    {
        header("Location: ADM_visualizar_usuarios.php");
    }

    if (isset($_POST['codigo']) && isset($_POST['senha'])) 
    {
        if (empty($_POST['codigo'])) 
        {
            $erro = "Preencha seu código";
        } 
        else if (empty($_POST['senha'])) 
        {
            $erro = "Preencha sua senha";
        } 
        else 
        {
            $codigo = $_POST['codigo'];
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM login_adm WHERE codigo='$codigo' AND senha='$senha'";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows == 1) 
            {
                $tabela = $resultado->fetch_assoc();
                $_SESSION['id_ADM'] = $tabela['id_ADM'];
                header("Location: ADM_visualizar_usuarios.php");
            } 
            else 
            {
                $erro = "Usuário e/ou senha inválidos";
            }
        }
        $conexao->close();
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
                <img class="login__imagem" src="../img/Logo.png" alt="Logo Easy House">
            </a>
        </div>
        <div>
            <h1>Área Privada</h1>
        </div>
        <form method="post" action="">
            <div>
                <label class="input__email">Código<br> 
                    <input class="login__email" type="text" name="codigo" />
                </label>
            </div>
            <div>
                <label class="input__senha">Senha<br> 
                    <input class="login__senha" type="password" name="senha" />
                </label>
            </div>
            <?php
                if (!empty($erro)) 
                {
                    echo "<p style='color: red;'>$erro</p>";
                }
            ?>
            <div>
                <input class="login__botao__entrar" type="submit" value="ENTRAR" /><br/>
            </div>
        </form>
    </section>
</body>
</html>
