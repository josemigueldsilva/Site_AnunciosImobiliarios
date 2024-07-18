<?php
    session_start();

    if (!isset($_SESSION['id'])) 
    {
        header("Location: login.php");
    }

    $conexao = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "easyhouse"
    );

    $pathImagem = null;

    $arquivo = $_FILES['arquivo'];

    if ($arquivo['size'] > 10000000) 
    {
        $_SESSION['erro_cadastro_imovel'] = "Arquivo muito grande!! Máx 10mb";
        header("Location: anunciar.php");
    }

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png") 
    {
        $_SESSION['erro_cadastro_imovel'] = "Tipo de arquivo não aceito";
        header("Location: anunciar.php");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if ($deu_certo) 
    {
        $pathImagem = $path;
    } 
    else 
    {
        $_SESSION['erro_cadastro_imovel'] = "Falha ao enviar arquivo";
        header("Location: anunciar.php");
    }

    $id = $_POST['id'];
    $endereco = $_POST['endereco'];
    $valor = $_POST['valor'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $numero = $_POST['numero'];
    $descricao = $_POST['descricao'];
    $contato = $_POST['contato'];
    $situacao = $_POST['situacao'];
    $usuario_id = $_POST['usuario_id'];

    $sql = "INSERT INTO imovel (endereco, valor, cidade, estado, numero, situacao, descricao, contato, usuario_id, pathImagem)
            VALUES ('$endereco', '$valor', '$cidade', '$estado', '$numero', '$situacao', '$descricao', '$contato', '$usuario_id', '$pathImagem')";

    if ($conexao->query($sql)) 
    {
        header("Location: index.php");
    } 
    else 
    {
        $_SESSION['erro_cadastro_imovel'] = "Erro ao cadastrar imóvel: " . $conexao->error;
        header("Location: anunciar.php");
    }
?>
