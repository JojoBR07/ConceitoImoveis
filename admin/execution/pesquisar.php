<?php

require_once ('../validation/connect.php');

if (isset($_POST['pesquisar']) && !empty($_POST['pesquisar'])) {

    if (($_POST['pesquisar']) == "imovel") {
        
        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM `imovel` WHERE `id` = '$codigo'";
        $row = mysqli_query($conexao, $sql);
        $total_imoveis = mysqli_num_rows($row);
    } else if (($_POST['pesquisar']) == "artigo") {

        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM `artigos` WHERE `id` = '$codigo'";
        $row = mysqli_query($conexao, $sql);
        $total_imoveis = mysqli_num_rows($row);
    } else if (($_POST['pesquisar']) == "listar_imovel") {

        $sql = "SELECT * FROM `imovel` WHERE 1";
        $row = mysqli_query($conexao, $sql);
        $total_imoveis = mysqli_num_rows($row);
    } else {

        $sql = "SELECT * FROM `artigos` WHERE `1";
        $row = mysqli_query($conexao, $sql);
        $total_imoveis = mysqli_num_rows($row);
    }
}

