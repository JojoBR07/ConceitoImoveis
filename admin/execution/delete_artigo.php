<?php

require_once('../validation/connect.php');

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {

    $codigo = $_GET['codigo'];
    
    $sql = "DELETE FROM `artigos` WHERE `id` = '$codigo'";
    
    mysqli_query($conexao, $sql);
    
    header("location: ../interaction/pesquisar_artigo.php?pesquisar=listar_artigo"); 
}

