<?php
    session_start();

    if (!isset($_SESSION['id_ADM'])) 
    {
        header("Location: ADM_login.php");
    }

    $conexao = new mysqli(
        "127.0.0.1",   
        "root",         
        "",             
        "easyhouse"     
    );

    //Pegando ID do usuario
    $id = $_GET['id'];

    $sql = "SELECT * FROM login WHERE id = $id"; 

    $resultado = $conexao->query($sql);
    $dados = $resultado -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite seu Imóvel</title>
</head>
<body>
    <section class="anunciar__container">
            <div>
                <a href="index.php">
                <img class="anunciar__imagem" src="../img/Logo.png" alt="Logo Easy House"> </a>
            </div>
            <h2>Edite o cadastro dos usuários</h2>
            <form method="post" enctype="multipart/form-data" action="ADM_alterar_usuario_salvar.php">
                    <div>
                        <input type = "hidden" value = "<?php echo $dados['id'];?>" name = "id"/>
                        <div>
                            <label>Nome
                        </div>   
                            <input class="anunciar__estado" type="text"  name="nome" value="<?php echo $dados["nome"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>E-mail
                        </div>
                            <input class="anunciar__cidade" type="text"  name="usuario" value="<?php echo $dados["usuario"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Senha
                        </div> 
                            <input class="anunciar__endereco" type="password" name="senha" value="<?php echo $dados["senha"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Celular
                        </div> 
                            <input class="anunciar__numero__casa" type="text"  name="celular" value="<?php echo $dados["celular"]; ?>" required/> </label>
                    </div>
                    
                    <div>
                        <input class="anunciar__botao__enviar" type="submit" value="SALVAR ALTERAÇÕES"/>
                    </div>
                </form>
                </br>
    </section>
</body>
</html>