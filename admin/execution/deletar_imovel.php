<?php

require_once('../validation/connect.php');

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {

    $codigo = $_GET['codigo'];
    
    $sql = "DELETE FROM `imovel` WHERE `id` = '$codigo'";
    
    mysqli_query($conexao, $sql);

    header("location: ../interaction/pesquisar_imovel.php?pesquisar=listar_imovel"); 
}

