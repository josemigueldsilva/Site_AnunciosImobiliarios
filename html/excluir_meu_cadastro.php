<?php

    session_start();

    if (!isset($_SESSION['id'])) 
    {
        header("Location: login.php");
    }

    $usuario_id = $_SESSION["id"];

    $conexao = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "easyhouse"
    );


    //Excluindo todos os imóveis cadastrados pelo usuário
    $sql_imoveis = "DELETE FROM imovel WHERE usuario_id = '$usuario_id'";

    // Se não houver erros a query para excluir os imóveis cadastrados é executada
    if ($conexao->query($sql_imoveis)) 
    {
        //Após excluir os imóveis, exclui o cadastro do usuário
        $sql_usuario = "DELETE FROM login WHERE id = '$usuario_id'";

        if ($conexao->query($sql_usuario)) 
        {
            // Encerra a sessão após a exclusão
            session_destroy();
            header("Location: index.php");
        } 
    }
?>
