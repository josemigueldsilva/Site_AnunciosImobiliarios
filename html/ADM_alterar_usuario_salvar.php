<?php
    session_start();

    if (!isset($_SESSION['id_ADM'])) 
    {
        header("Location: ADM_login.php");
    }

    $usuario_id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $celular= $_POST['celular'];

    $conexao = new mysqli(
        "127.0.0.1", 
        "root", 
        "", 
        "easyhouse"
    );

    if ($conexao->connect_error) 
    {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    $sql = "SELECT COUNT(1) as total FROM login WHERE id=$usuario_id";
    $resultado = $conexao->query($sql);
    $total = $resultado->fetch_assoc();

    if ($total["total"] == 0) 
    {
        echo "Id não existe";
        exit;
    }

    $sql = "UPDATE login SET
            usuario='$usuario',
            nome='$nome', 
            senha='$senha', 
            celular='$celular'
            WHERE id=$usuario_id";

    $conexao->query($sql);
    header("Location: ADM_visualizar_usuarios.php");

?>
