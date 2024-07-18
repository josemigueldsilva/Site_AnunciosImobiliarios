<?php

    session_start();

    if (!isset($_SESSION['id_ADM'])) 
    {
        header("Location: ADM_login.php");
        exit();
    }
    $conexao = new mysqli(
        "127.0.0.1", 
        "root", 
        "", 
        "easyhouse"
    );

    $id_ADM = $_SESSION['id_ADM'];
    $sql = "SELECT * FROM login";
    $resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/meusImoveis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <nav>
        <ul class="menu__template">
            <li><a href="index.php">Home</a></li>
            <li><a href="ADM_visualizar_imoveis.php">Imóveis</a></li>
            <li><a href="ADM_visualizar_usuarios.php">Usuários</a></li>
            <li><a href="ADM_logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="anunciar__container">
        <h1>Usuários</h1><br>
    </section>
    
    <section>
        <form class="example" action="ADM_buscar_usuario.php" method="GET">
            <div class="botao__de__busca">
                <input type="text" name="localizar" placeholder="Procurar...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
            </br>
        </form>
    </section><br>

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
    </table>

    <script src="../main.js"></script>

</body>
</html>
