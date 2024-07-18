<?php

    session_start();
    //Se não estiver logado, vai diretamente para a página de login
    if (!isset($_SESSION['id'])) 
    {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">

    <title>Anunciar</title>
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

    <section class="anunciar__container">

        <h2> Anuncie seu Imóvel! </h2>

        </br>

            <form method="post" enctype="multipart/form-data" action="cadastroImovel.php">
                <div>
                    <!-- Enviando o id do usuario para relacioná-lo com o imóvel !-->
                    <input type = "hidden" value = "<?php echo $_SESSION['id'];?>" name = "usuario_id"/>
                    <div>
                        <label>Estado
                    </div>   
                        <input class="anunciar__estado" type="text"  name="estado" placeholder="ex: SP" required/></label>
                </div>

                <div>
                    <div>
                        <label>Cidade 
                    </div>
                        <input class="anunciar__cidade" type="text"  name="cidade" placeholder="ex: Bauru" required/> </label>
                </div>

                <div>
                    <div>
                        <label>Endereço
                    </div> 
                        <input class="anunciar__endereco" type="text" name="endereco" placeholder="ex: Rua Francisco Alves, Jd. Bela Vista" required/> </label>
                </div>

                <div>
                    <div>
                        <label>Número da Casa
                    </div> 
                        <input class="anunciar__numero__casa" type="text"  name="numero" placeholder="ex: 10-49" required/> </label>
                </div>

                <div>
                    <div>
                        <label>Descrição sobre a Casa
                    </div> 
                        <input class="anunciar__descricao" type="text"  name="descricao" placeholder="ex: 5 quartos, 2 banheiros, 1 piscina..." required/> </label>
                </div>

                <div>
                    <div>
                        <label>Contato 
                    </div>                           
                        <input class="anunciar__contato" type="text"  name="contato" placeholder="ex: (14) 9881-0367"required/> </label>
                </div>

                <div>
                    <div>
                        <label>Situação 
                    </div>
                        <input class="anunciar__situacao" type="text"  name="situacao" placeholder="ex: Aluguel ou Venda"required/> </label>
                </div>

                <div>
                    <div>
                        <label>Valor
                    </div>
                        <input class="anunciar__valor" type="number" name="valor" placeholder="ex: 200000"required/> </label>
                </div>
                
                </br>
                
                <div>
                    <label for="arquivo" class="anunciar__botao__arquivo">Fotos do imóvel</label>
                </div>

                <div>
                    <input class="botao__arquivo" id="arquivo" type="file" name="arquivo" required onchange="mostrarNomeArquivo(this)">
                    <span id="nome-arquivo-selecionado"></span>
                </div>

                <?php
                    if (isset($_SESSION['erro_cadastro_imovel'])) 
                    {
                        echo "<p style='color: red;'>" . $_SESSION['erro_cadastro_imovel'] . "</p>";
                        unset($_SESSION['erro_cadastro_imovel']);
                    }
                ?>
                
                <div>
                    <input class="anunciar__botao__enviar" type="submit" value="CADASTRAR"/> <a class = "anunciar__botao__enviar" href="index.php">Voltar</a>
                </div>
            </form>
    </section>

    <script src="../main.js"></script>
    
</body>
</html>
