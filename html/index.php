<?php

    session_start();

    $con = new mysqli("127.0.0.1", 
                    "root", 
                    "", 
                    "easyhouse");
    {
        $sql = "SELECT * FROM imovel LIMIT 3";
    }

    $rs = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Easy House</title>
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

    <main>
        <section>
            <form class="example" action="buscar.php" method ="GET">
                    <h2>A casa que você precisa está aqui.</h2>
                <div class="botao__de__busca"> 
                    <input type="text" name = "localizar" placeholder="Procurar...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </section> <br/>

        <section class="carrossel">
            <div class="carrossel_imagens">
                <a href="buscar.php?localizar="> 
                <img class="banner__imagem" src="../img/Banner1.png" alt="Banner"> 
                <img class="banner__imagem" src="../img/Banner2.png" alt="Banner2"> </a> <!-- #0056A5, #CAE9EB-->
            </div>

            <div class="carrossel_botoes">
                <button class="carrossel_botao1" id="anterior"><</button>
                <button class="carrossel_botao2" id="proximo">></button>
            </div>
        </section>
    
         <section class="dispositivos">
            <h2 class="dispositivos__titulo">Encontre o imóvel que mais combine com você!</h2>
            <ul class="dispositivos__listas">
                <li>
                    <img class="imagem__quadro" src="../img/Localização.jpg" alt="Imagem Localização">
                    <h3>Localização Privilegiada</h3>
                </li>
                <li>
                    <img class="imagem__quadro" src="../img/Pet.jpg" alt="Imagem Pet">
                    <h3>Ideal para o seu pet</h3>
                </li>
                <li>
                    <img class="imagem__quadro" src="../img/Familia.jpg" alt="Imagem Família">
                    <h3>Confortável para sua família</h3>
                </li>
            </ul>
        </section>
        <br>
        <div class="index__titulo">
            <h2 class="dispositivos__titulo"> Mais procurados</h2>
        </div>
        <div class="index__container">
                <?php
                    while($linha = $rs->fetch_assoc()) 
                    {
                ?>
                    <div class="index__anuncios">
                        <img class="index__anuncios__imagens" src = "<?php echo $linha['pathImagem'];?>">
                        <?php echo $linha["cidade"] . ", " . $linha["estado"];?> <br>
                        <?php echo $linha["endereco"] . ", " . $linha["numero"];?> <br>
                        <?php echo $linha["situacao"] . ": R$" . $valor_formatado = number_format($linha["valor"], 2, ',', '.');  "$valor_formatado"; ?> <br>
                        <div class="index__contato"><?php echo $linha["contato"];?> </div>
                    </div>
                <?php 
                    } 
                ?>
        </div>
        <br>
        <div class="imagem__links__titulo">
            <h2 class="dispositivos__titulo"> Imóveis em todo o Brasil para comprar ou alugar </h2>
        </div>
        <div class= "imagem__links__container">
            <div class= "imagem__links__conteudo">
                <div class="imagens__links__item">
                    <img class="imagem__links_imagens" src="../img/sp.png" alt="imagem de sp">
                    <h3>São Paulo</h3>
                    <a href="buscar.php?localizar=Bauru">Bauru</a> <br>
                    <a href="buscar.php?localizar=Guarulhos">Guarulhos</a> <br>
                    <a href="buscar.php?localizar=Campinas">Campinas</a>
                </div>
                <div class="imagens__links__item">
                    <img class="imagem__links_imagens" src="../img/rj.jpg" alt="imagem de rj">
                    <h3>Rio de Janeiro</h3>
                    <a href="buscar.php?localizar=São Gonçalo">São Gonçalo</a> <br>
                    <a href="buscar.php?localizar=Nova%20%Iguaçu">Nova Iguaçu</a> <br>
                    <a href="buscar.php?localizar=Belford%20%Roxo">Belford Roxo</a>
                </div>
                <div class="imagens__links__item">
                    <img class="imagem__links_imagens" src="../img/es.jpg" alt="imagem de vitoria es">
                    <h3>Espírito Santo</h3>
                    <a href="buscar.php?localizar=Vila%20%Velha">Vila Velha</a> <br>
                    <a href="buscar.php?localizar=Vitória">Vitória</a> <br>
                    <a href="buscar.php?localizar=São%20%Mateus">São Mateus</a>
                </div>
                <div class="imagens__links__item">
                    <img class="imagem__links_imagens" src="../img/bh.jpg" alt="imagem de bh minas">
                    <h3>Minas Gerais</h3>
                    <a href="buscar.php?localizar=Belo%20%Horizonte">Belo Horizonte</a> <br>
                    <a href="buscar.php?localizar=Uberlândia">Uberlândia</a> <br>
                    <a href="buscar.php?localizar=Valinhos">Valinhos</a>
                </div>
            </div>                              
        </div>
    </main>

    <footer class="rodapé">
        <ul class="lista-rodapé">
            <li class="rodapé__titulo">Grupo Easy House</li>
            <li class="lista-rodapé__item">
                        <img class="lista-rodapé__imagem" src="../img/instagram.png" alt="Logo do instagram">
                        <a href="https://www.instagram.com/" class="lista-rodapé__link">José Miguel</a>
                    </li>
                <li class="lista-rodapé__item">
                    <img class="lista-rodapé__imagem" src="../img/instagram.png" alt="Logo do instagram">
                    <a href="https://www.instagram.com/" class="lista-rodapé__link">Gabriel Lima</a>
                </li>
                <li class="lista-rodapé__item">
                <img class="lista-rodapé__imagem" src="../img/adm.png" alt="Icone ADM">
                    <a class="lista-rodapé__link" href="ADM_login.php">Administrador</a>
                </li>
        </ul> 

            <ul class="lista-rodapé">
            <li class="lista-rodapé__titulo">Encontre Imóveis</li>                       
                <li class="lista-rodapé__item">
                    <a href="buscar.php?localizar=venda" class="lista-rodapé__link">Comprar</a>
                </li>
                <li class="lista-rodapé__item">
                    <a href="buscar.php?localizar=aluguel" class="lista-rodapé__link">Alugar</a>
                </li>
            </ul>

            <ul class="lista-rodapé">
                <li class="lista-rodapé__titulo">Anunciante</li>
            <li class="lista-rodapé__item">
                <a href="anunciar.php" class="lista-rodapé__link">Anunciar</a>
                </li>                
            </ul>

            <ul class="lista-rodapé">
                <li class="lista-rodapé__titulo">Comunidade Easy House</li>
                <li class="lista-rodapé__item">
                    <img class="lista-rodapé__imagem" src="../img/instagram.png" alt="Logo do instagram">
                    <img class="lista-rodapé__imagem" src="../img/facebook.png" alt="Logo do facebook">
                    <img class="lista-rodapé__imagem" src="../img/x.png" alt="Logo do x">
                    <img class="lista-rodapé__imagem" src="../img/youtube.png" alt="Logo do youtube">
                    <img class="lista-rodapé__imagem" src="../img/telegram.png" alt="Logo do telegram">
                    <img class="lista-rodapé__imagem" src="../img/linkedin.png" alt="Logo do linkedin">
                </li>
            </ul>
    </footer>

    <script src="../main.js"></script>

</body>
</html>