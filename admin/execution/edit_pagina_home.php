<?php

require_once('../validation/connect.php');


$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];
$twitter = $_POST['twitter'];
$imovel_1 = $_POST['imovel_1'];
$imovel_2 = $_POST['imovel_2'];
$imovel_3 = $_POST['imovel_3'];

$sql = "SELECT * FROM `imovel` WHERE `id` = '$imovel_1'";
$row = mysqli_query($conexao, $sql);
$num = mysqli_num_rows($row);

if ($num > 0) {
    $sql = "SELECT * FROM `imovel` WHERE `id` = '$imovel_2'";
    
    $row = mysqli_query($conexao, $sql);
    $num = mysqli_num_rows($row);
    
    if ($num > 0) {
        
        $sql = "SELECT * FROM `imovel` WHERE `id` = '$imovel_3'";
        $row = mysqli_query($conexao, $sql);
        $num = mysqli_num_rows($row);
        
        if ($num > 0) {
            
            $sql = "UPDATE `home` SET `imovel_1`='$imovel_1',`imovel_2`='$imovel_2',`imovel_3`='$imovel_3',`facebook`='$facebook',`instagram`='$instagram',`linkedin`='$linkedin',`twitter`='$twitter' WHERE 1";

            if (mysqli_query($conexao, $sql)) {
                header("location: ../interaction/pagina_home.php");
            } else {
                echo 'Erro, não foi possivel concluir esta operação';
            }
        }else{
            echo "O imovel 3 não existe no banco de dados, insira o código de outro imóvel!";
        }
        
    } else {
        echo "O imovel 2 não existe no banco de dados, insira o código de outro imóvel!";
    }
} else {
    echo "O imovel 1 não existe no banco de dados, insira o código de outro imóvel!";
}

