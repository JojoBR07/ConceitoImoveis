<?php

require_once('../validation/connect.php');

$sql = "SELECT * FROM `artigos` ORDER BY `id` DESC LIMIT 4";
$row = mysqli_query($conexao, $sql);
$resgistro = mysqli_fetch_assoc($row);
