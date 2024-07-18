<?php

    $usuario = @$_POST['usuario'];
    $senha = @$_POST['senha'];
    $nome = @$_POST['nome'];
    $celular = @$_POST['celular'];

    $conexao = new mysqli(
        "127.0.0.1",  
        "root",         
        "",             
        "easyhouse"       
    );

    $sql = "
    INSERT INTO login (usuario, senha, nome, celular) 
    VALUES ('$usuario','$senha','$nome','$celular')
    ";

    $rs = $conexao->query($sql);

    header("location: login.php");

?>