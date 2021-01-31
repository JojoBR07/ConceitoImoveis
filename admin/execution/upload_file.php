<?php

##########################################################################
// Pagina Responsavel por fazer o upload dos arquivos para o servidor
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
include 'files/pdftk.php';

$impressao = $_POST['impressao'];
$copias = $_POST['copias'];
$cobranca = $_POST['cobranca'];

date_default_timezone_set('America/Sao_Paulo');

$hora_atual = date('H:i:s');
$data_atual = date('d/m/y');


// verifica se foi enviado um arquivo
if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome_arquivo = $_FILES['arquivo']['name'];

    // Pega a extensão
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    // Converte a extensão para minúsculo
    $extensao = strtolower($extensao);


    /*
      |--------------------------------------------------------------------------
      | Extensão do arquivo enviado
      |--------------------------------------------------------------------------
      |
      | > STRSTR faz uma pesquisa no conteudo de um string
      | > Neste caso o STRSTR é utilizado para verificar a extensão do arquivo
      | > O STRSTR procura pela existencia da extenção pdf
      | > Se ela for encontrada ele renomeia o arquivo e finaliza o upload
      | > Caso contrario, a extensão do arquivo é dada como inválda
      |--------------------------------------------------------------------------
     */

    // Somente pdf, .pdf
    // Caso fosse permitido imagens: .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if (strstr('.pdf', $extensao)) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid(time()) . '.' . $extensao;

        // Concatena a pasta com o nome
        //$destino = "../execution/files/" . $novoNome;
        $destino = "../execution/files/" . $novoNome;

        // tenta mover o arquivo para o destino
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
            //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            //echo ' < img src = "' . $destino . '" />';
            //pegar valor por pagina
            $sql = "SELECT * FROM `config` where `codigo` = '1'";
            $row = mysqli_query($conexao, $sql);
            $result = mysqli_fetch_assoc($row);
            $custo_por_pagina = doubleval($result['custo_pagina']);

            //pegar numero de páginas atravez do CMD utilizando o utilitario pdftk
            $paginas = numero_paginas($novoNome);
            
            //custo total
            $custo = $paginas * $custo_por_pagina;

           echo '<br/>'. $sql = "INSERT INTO fila_impressao (usuario, nome_documento, hora, data, custo, paginas, usuario_de_cobraca, status, local_documento) "
                    . "VALUES ('{$_SESSION['user']}', '$nome_arquivo', '$hora_atual', '$data_atual', '$custo', '$paginas', 'calculando', 'Aguardando Impressão', '$novoNome')";

            if (mysqli_query($conexao, $sql)) {
                mysqli_close($conexao);
                header("location: ../interaction/fila_impressao.php");
            } else {
                $msg = "Error: " . $sql . "<br>" . mysqli_error($conexao);
                mysqli_close($conexao);
                header("location: ../interaction/fila_impressao.php?status=$msg");
            }
        } else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    } else
        echo 'Extensão inválida "*.pdf"<br />';
} else
    echo 'Deve ser enviado um arquivo!<br />';
?>
