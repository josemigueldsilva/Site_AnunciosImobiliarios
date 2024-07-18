<?php

    $id = $_GET["id"];

    $conexao = new mysqli("127.0.0.1",
                      "root",
                      "",
                      "easyhouse");
    
    $sql = "DELETE FROM imovel WHERE id = '$id'";
    $conexao -> query($sql);

    header("location: ADM_visualizar_imoveis.php");

?>