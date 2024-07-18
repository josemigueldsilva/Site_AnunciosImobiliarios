<?php

    session_start();

    if (!isset($_SESSION['id_ADM'])) 
    {
        header("Location: ADM_login.php");
    }

    $conexao = new mysqli("127.0.0.1", 
                    "root", 
                    "", 
                    "easyhouse");

    if(isset($_GET["localizar"])) 
    {
        $localizar = $_GET["localizar"];
        
        $sql = "SELECT * FROM login WHERE nome LIKE '%$localizar%'
        OR senha LIKE '%$localizar%'
        OR usuario LIKE '%$localizar%'
        OR celular LIKE '%$localizar%'
        OR id LIKE '%$localizar%'";
    } 
    else 
    {
        $sql = "SELECT * FROM imovel WHERE";
    }

    $resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anúncios</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/meusImoveis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
        <section class="anunciar__container">
            <h1>Usuários Encontrados</h1> </BR>
        </section>

        <section>
            <form class="example" action="ADM_buscar_usuario.php" method ="GET">
                <div class="botao__de__busca"> 
                    <input type="text" name = "localizar" placeholder="Procurar...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </section> <br/>
        
        <table id="customers">
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Nome</th>
            <th>Senha</th>
            <th>Celular</th>
            <th>Opções</th>
        </tr>
        <?php

            while($linha=$resultado -> fetch_assoc())
            {
            echo "<tr>
                        <td>" . $linha["id"]. "</td>
                        <td>" . $linha["usuario"]. "</td>
                        <td>" . $linha["nome"]. "</td>
                        <td>" . $linha["senha"]. "</td>
                        <td>" . $linha["celular"]. "</td>
                        <td>
                            <a href = 'ADM_alterar_usuario.php?id=" . $linha["id"] . "' class = 'botao__editar'>✏️</a>
                        
                            <a href = 'ADM_excluir_usuario.php?id=" . $linha["id"] . "' class = 'botao__excluir'>🗑️</a>
                        </td>
                    </tr>";
            }
        ?>
        </table> <br>

        <div class = "botao__voltar__adm" >
            <a class = "botao__voltar__adm2" href="ADM_visualizar_usuarios.php">Voltar</a>
        </div>
        
        <script src="../main.js"></script>
</body>
</html>