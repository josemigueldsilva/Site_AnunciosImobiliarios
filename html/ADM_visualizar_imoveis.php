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
    $sql = "SELECT * FROM imovel";
    $resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/meusImoveis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Meus Anúncios</title>
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
        <h1>Anúncios Feitos</h1><br>
    </section>
    <section>
        <form class="example" action="ADM_buscar_imovel.php" method="GET">
            <div class="botao__de__busca">
                <input type="text" name="localizar" placeholder="Procurar...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </section><br>
    <div>
        <table class="anuncio__container">
            <tbody>
                <?php
                    while($linha = $resultado->fetch_assoc()) {
                ?>
                    <tr class="anuncio__tabela">
                        <td><img class="anuncio__imagem" src = "<?php echo $linha['pathImagem'];?>"></td>
                        <td><?php echo $linha["cidade"] . ", " . $linha["estado"];?> <br>
                            <?php echo $linha["endereco"] . ", " . $linha["numero"];?> <br>
                            <?php echo wordwrap($linha["descricao"], 50, "<br>\n"); ?> <br><br>
                            <div class="anuncio__valor"><?php $valor_formatado = number_format($linha["valor"], 2, ',', '.');
                                    echo $linha["situacao"] . ": " . "R$ $valor_formatado"; ?> </div>
                            <div class="anuncio__contato"> <?php echo $linha["contato"];?><br></div> 
                                <a href="ADM_alterar_imovel.php?id=<?php echo $linha['id']; ?>" class = "botao__editar">✏️</a>
                                <a href="ADM_excluir_imovel.php?id=<?php echo $linha['id']; ?>" class = "botao__excluir">🗑️</a>
                        </td>
                    </tr>
                <?php 
                    } 
                ?>
            </tbody>
        </table>
    </div>
<script src="../main.js"></script>
</body>
</html>
