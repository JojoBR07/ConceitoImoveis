<?php

##########################################################################
// Pagina Responsavel por fazer adição do imovel na base de dados
############################################################################

/**
 *
 * SESSION_START indica ao php que nesta pagina será utilizado funções
 * envolvendo sessão.
 *
 */
session_start();

/**
 * Require once faz uma requisição para o arquivo connect.php
 * O arquivo connect.php retorna se a conexão com o banco de dados foi realizada com sucesso
 * Caso tenha sucesso, realizamos em seguida um select na tabela de banco de dados
 */
require_once('../validation/connect.php');


$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$data = $_POST['data'];

$descricao = $_POST['descricao'];
$texto = $_POST['texto'];
$frase = $_POST['frase'];
$autor_frase = $_POST['autor_frase'];


$arquivo_tmp = $_FILES['imagem_capa']['tmp_name'];
$nome = $_FILES['imagem_capa']['name'];
$extensao = pathinfo($nome, PATHINFO_EXTENSION);
$extensao = strtolower($extensao);

if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
    $novoNome = uniqid(time()) . '.' . $extensao;
    $destino_capa = '../../files/' . $novoNome;

    if (@move_uploaded_file($arquivo_tmp, $destino_capa)) {
        echo 'Arquivo salvo com sucesso em : <strong>' . $destino_capa . '</strong><br />';
        echo ' < img src = "' . $destino_capa . '" />';

        $arquivo_tmp = $_FILES['imagem_artigo']['tmp_name'];
        $nome = $_FILES['imagem_artigo']['name'];
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        $extensao = strtolower($extensao);

        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            $novoNome = uniqid(time()) . '.' . $extensao;
            $destino_imagem = '../../files/' . $novoNome;
            if (@move_uploaded_file($arquivo_tmp, $destino_imagem)) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino_imagem . '</strong><br />';
                echo ' < img src = "' . $destino_imagem . '" />';

                $sql = "INSERT INTO `artigos`(`titulo`, `sub_titulo`, `imagem`, `autor`, `data`, `categoria`, `descicao`, `texto`, `frase`, `autor_frase`, `capa`) "
                        . "VALUES ('$titulo','$subtitulo','$destino_imagem','$autor','$data','$categoria','$descricao','$texto','$frase','$autor_frase','$destino_capa')";


                if (mysqli_query($conexao, $sql)) {
                    header("location: ../interaction/admin_artigo.php");
                } else {
                    $msg = "Error: " . $sql . "<br>" . mysqli_error($conexao);
                    echo $msg;
                    mysqli_close($conexao);
                }
                header("location: ../interaction/admin_artigo.php");
            } else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        }
    } else
        echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
}

header("location: ../interaction/admin_artigo.php");