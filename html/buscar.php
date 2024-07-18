<?php

    session_start();

    $conexao = new mysqli("127.0.0.1", 
                    "root", 
                    "", 
                    "easyhouse");

    if(isset($_GET["localizar"])) 
    {
        $localizar = $_GET["localizar"];
        $sql = "SELECT * FROM imovel WHERE cidade LIKE '%$localizar%'
        OR estado LIKE '%$localizar%'
        OR endereco LIKE '%$localizar%'
        OR situacao LIKE '%$localizar%'";
    } 
    else 
    {
        $sql = "SELECT * FROM imovel";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<header class="cabecalho">
        <nav class="cabecalho__container">
                
            <img class="cabecalho__imagem" src="../img/Logo.png" alt="Logo Easy House">
                
            <ul class="links__menu__cabecalho">
                <li><a class="links__cabecalho" href="buscar.php?localizar=Aluguel">Alugar</a></li>
                <li><a class="links__cabecalho" href="buscar.php?localizar=Venda">Comprar</a></li>
                <li><a class="links__cabecalho" href="anunciar.php">Anunciar</a></li>
            </ul>

            <ul class="dropdown">
                <?php if (isset($_SESSION['nome'])) { ?>
                <li class="dropbtn"><?php echo ($_SESSION['nome']); ?> <img id="usuario" class="Usuario" src="../img/Usuario.png" alt="Imagem do Usuario"></li>

                <div class="dropdown-content">
                    <li><a class="conta__menu__links" id="meu_cadastro-link" href="alterar_meu_cadastro.php">Perfil</a></li>
                    <li><a class="conta__menu__links" id="meus_anuncios-link" href="meus_anuncios.php">Anúncios</a></li>
                    <li><a class="conta__menu__links" id="logout-link" href="logout.php">Logout</a></li>
                </div>
            </ul>

            <div>
                <?php } else { ?>
                    <a class="botao__cadastrar" href="cadastrar.php">Cadastrar</a>
                    <a class="botao__entrar" href="login.php">Entrar <img class="Usuario" src="../img/Usuario.png" alt="Usuario"> </a>
                    <?php } ?>
                </div>      
        </nav>
    </header>


        <section>
            <form class="example" action="buscar.php" method ="GET">
                <div class="botao__de__busca"> 
                    <input type="text" name = "localizar" placeholder="Procurar...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </section> <br/>

    <div>
            <table class="anuncio__container">
                <tbody>
                    <?php
                        while($linha = $resultado->fetch_assoc()) {
                    ?>
                    <!--Abre uma linha na tabela-->
                        <tr class="anuncio__tabela">
                            <td> <img class="anuncio__imagem" src = "<?php echo $linha['pathImagem'];?>"></td>
                            <td> <?php echo $linha["cidade"] . ", " . $linha["estado"];?> <br>
                                 <?php echo $linha["endereco"] . ", " . $linha["numero"];?> <br><br>
                                 <?php echo wordwrap($linha["descricao"], 50, "<br>\n"); ?> <br><br>
                            <div class="anuncio__valor"><?php $valor_formatado = number_format($linha["valor"], 2, ',', '.');
                                       echo $linha["situacao"] . ": " . "R$ $valor_formatado"; ?> </div>
                            <div class="anuncio__contato"> <?php echo $linha["contato"];?><br></div> </td></tr>
                            <?php 
                               } 
                            ?>
                </tbody>
            </table>
    </div>

    <script src="../main.js"></script>
</body>
</html>