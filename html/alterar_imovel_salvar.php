<?php
    session_start();

    if (!isset($_SESSION['id'])) 
    {
        header("Location: login.php");
    }

    $id = $_POST['id'];
    $usuario_id = $_POST['usuario_id'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $descricao = $_POST['descricao'];
    $contato = $_POST['contato'];
    $situacao = $_POST['situacao'];
    $valor = $_POST['valor'];

    $conexao = new mysqli(
        "127.0.0.1", 
        "root", 
        "", 
        "easyhouse"
    );

    $sql = "SELECT COUNT(1) as total FROM imovel WHERE id=$id";
    $resultado = $conexao->query($sql);
    $total = $resultado->fetch_assoc();

    if ($total["total"] == 0) 
    {
        echo "Id não existe";
        exit;
    }

    $pathImagem = null;

    // Verifica se um novo arquivo foi enviado
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) 
    {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['size'] > 10000000) 
        {
            die("Arquivo muito grande!! Máx 10mb");
        }

        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png") 
        {
            die("Tipo de arquivo não aceito");
        }

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
        if ($deu_certo)
        {
            $pathImagem = $path;
        } 
        else 
        {
            echo "<p>Falha ao enviar arquivo</p>";
        }
    }

    $sql = "UPDATE imovel SET 
            estado='$estado', 
            cidade='$cidade', 
            endereco='$endereco', 
            numero='$numero', 
            descricao='$descricao', 
            contato='$contato', 
            situacao='$situacao', 
            valor='$valor'";

    // Se uma nova imagem foi enviada, inclui o campo pathImagem na consulta
    if ($pathImagem != null) 
    {
        $sql .= ", pathImagem='$pathImagem'";
    }

    $sql .= " WHERE id=$id";

    $conexao->query($sql);
    header("Location: meus_anuncios.php");

?>
