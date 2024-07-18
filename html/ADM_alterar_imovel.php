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

    //Pegando ID do imóvel
    $id = $_GET['id'];

    $sql = "SELECT * FROM imovel WHERE id = $id"; 

    $resultado = $conexao->query($sql);
    $dados = $resultado -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/meusImoveis.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite seu Imóvel</title>
</head>
<body>
    <section class="anunciar__container">
            <div>
                <a href="index.php">
                <img class="anunciar__imagem" src="../img/Logo.png" alt="Logo Easy House"> </a>
            </div>
            <h2>Edite o cadastro do imóvel</h2>
                <form method="post" enctype="multipart/form-data" action="ADM_alterar_imovel_salvar.php">
                    <div>
                    <input type = "hidden" value ="<?php echo $dados["id"]; ?>" name = "id"/>
                        <input type = "hidden" value ="<?php echo $dados["usuario_id"]; ?>" name = "usuario_id"/>
                        <div>
                            <label>Estado
                        </div>   
                            <input class="anunciar__estado" type="text"  name="estado" value="<?php echo $dados["estado"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Cidade 
                        </div>
                            <input class="anunciar__cidade" type="text"  name="cidade" value="<?php echo $dados["cidade"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Endereço
                        </div> 
                            <input class="anunciar__endereco" type="text" name="endereco" value="<?php echo $dados["endereco"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Número da Casa
                        </div> 
                            <input class="anunciar__numero__casa" type="text"  name="numero" value="<?php echo $dados["numero"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Descrição sobre a Casa
                        </div> 
                            <input class="anunciar__descricao" type="text"  name="descricao" value="<?php echo $dados["descricao"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Contato 
                        </div>                           
                            <input class="anunciar__contato" type="text"  name="contato" value="<?php echo $dados["contato"]; ?>" required/> </label>
                    </div>

                    <div>
                        <div>
                            <label>Situação 
                        </div>
                            <input class="anunciar__situacao" type="text"  name="situacao" value="<?php echo $dados["situacao"]; ?>" required/></label>
                    </div>

                    <div>
                        <div>
                            <label>Valor
                        </div>
                            <input class="anunciar__valor" type="number" name="valor" value="<?php echo $dados["valor"]; ?>" required/> </label>
                    </div>

                    <div>
                        <label>Imagem do imóvel</label>
                    </div>

                    </BR>

                    <div>
                        <img class="anuncio__imagem" src = "<?php echo $dados['pathImagem'];?>">
                    </div>

                    </br></br>

                    <div>
                        <label for="arquivo" class="anunciar__botao__arquivo">Nova Imagem</label>
                    </div>

                    <div>
                        <input class="botao__arquivo" id="arquivo" type="file" name="arquivo" onchange="mostrarNomeArquivo(this)">
                        <span id="nome-arquivo-selecionado"></span>
                    </div>
                    
                    <div>
                        <input class="anunciar__botao__enviar" type="submit" value="SALVAR ALTERAÇÕES"/>
                    </div>
                </form>
    </section>
    <script src="../main.js"></script>
</body>
</html>