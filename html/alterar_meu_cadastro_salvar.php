<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
    }

    $usuario_id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $celular= $_POST['celular'];

    $conexao = new mysqli(
        "127.0.0.1", 
        "root", 
        "", 
        "easyhouse"
    );


    $sql = "SELECT COUNT(1) as total FROM login WHERE id=$usuario_id";
    $resultado = $conexao->query($sql);
    $total = $resultado->fetch_assoc();

    if ($total["total"] == 0) 
    {
        echo "Id não existe";
        exit;
    }

    $sql = "UPDATE login SET 
            nome='$nome', 
            senha='$senha', 
            celular='$celular'
            WHERE id=$usuario_id";

    $conexao->query($sql);
    header("Location: index.php");

?>
