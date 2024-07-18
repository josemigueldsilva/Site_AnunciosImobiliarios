<?php

    session_start();

    if (!isset($_SESSION['id_ADM'])) 
    {
        header("Location: ADM_login.php");
    }

    $id_ADM = $_SESSION["id_ADM"];


    $conexao = new mysqli(
        "127.0.0.1", 
        "root", 
        "", 
        "easyhouse"
    );
    
    // Obtendo o ID do usuário a ser excluído
    $usuario_id = $_GET['id'];

    $sql_imoveis = "DELETE FROM imovel WHERE usuario_id = '$usuario_id'";

    if ($conexao->query($sql_imoveis)) 
    {
     
        $sql_usuario = "DELETE FROM login WHERE id = '$usuario_id'";

        if ($conexao->query($sql_usuario)) 
        {
            header("Location: ADM_visualizar_usuarios.php");
        } 
    }

?>
