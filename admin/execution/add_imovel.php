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

$proprietario = $_POST['proprietario'];
$email = $_POST['email'];
$fone = $_POST['fone'];
$profissao = $_POST['profissao'];

$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

$situacao = $_POST['situacao'];
$tipo = $_POST['tipo'];
$disponibilidade = $_POST['disponibilidade'];
$financiavel = $_POST['financiavel'];
$valor_imovel = $_POST['valor_imovel'];
$iptu = $_POST['iptu'];
$valor_comdominio = $_POST['valor_comdominio'];
$terreno = $_POST['terreno'];
$area_construida = $_POST['area_construida'];
$quartos = $_POST['quartos'];
$banheiros = $_POST['banheiros'];
$suites = $_POST['suites'];
$salas = $_POST['salas'];
$cozinhas = $_POST['cozinhas'];
$garagem = $_POST['garagem'];

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$descricao = $_POST['descricao'];
$observacao = $_POST['observacao'];

date_default_timezone_set('America/Sao_Paulo');

$hora_atual = date('H:i:s');
$data_atual = date('d/m/Y');

echo $sql = "INSERT INTO `imovel`(`proprietario`, `fone`, `email`, `profissao`, `titulo`, `subtitulo`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `complemento`, `situacao`, `valor`, `financiavel`, `tipo`, `disponibilidade`, `iptu`, `condominio`, `area_construida`, `terreno`, `quartos`, `banheiros`, `suites`, `salas`, `cozinhas`, `garagem`, `observacoes`,`descricao`, `data_adicao`, `hora_adicao`)
               VALUES ('$proprietario','$fone','$email','$profissao','$titulo','$subtitulo','$endereco','$numero','$bairro','$cidade','$estado','$cep','$complemento','$situacao','$valor_imovel','$financiavel','$tipo','$disponibilidade','$iptu','$valor_comdominio','$area_construida','$terreno','$quartos','$banheiros','$suites','$salas','$cozinhas','$garagem','$observacao','$descricao','$data_atual','$hora_atual')";

if (mysqli_query($conexao, $sql) or die(mysqli_error($conexao))) {

    $idInserido = intval(mysqli_insert_id($conexao));

// verifica se foi enviado um arquivo
    if (isset($_FILES['capa']['name']) && $_FILES['capa']['error'] == 0) {

        $arquivo_tmp = $_FILES['capa']['tmp_name'];
        $nome = $_FILES['capa']['name'];

// Pega a extensão
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);

// Converte a extensão para minúsculo
        $extensao = strtolower($extensao);

// Somente imagens, .jpg;.jpeg;.gif;.png
// Aqui eu enfileiro as extensões permitidas e separo por ';'
// Isso serve apenas para eu poder pesquisar dentro desta String
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
// Cria um nome único para esta imagem
// Evita que duplique as imagens no servidor.
// Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid(time()) . '.' . $extensao;

// Concatena a pasta com o nome
            $destino_capa = '../../files/' . $novoNome;

// tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino_capa)) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino_capa . '</strong><br />';
                echo ' < img src = "' . $destino_capa . '" />';
                $sql = "INSERT INTO `imagem`(`id_imovel`, `tipo`, `diretorio`) VALUES ('$idInserido','capa','$destino_capa')";
                if (mysqli_query($conexao, $sql) or die(mysqli_error($conexao))) {
                    
                }
            } else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        } else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    } else
        echo 'Você não enviou nenhum arquivo!';


// verifica se foi enviado um arquivo
    if (isset($_FILES['imagem_home']['name']) && $_FILES['imagem_home']['error'] == 0) {

        $arquivo_tmp = $_FILES['imagem_home']['tmp_name'];
        $nome = $_FILES['imagem_home']['name'];

// Pega a extensão
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);

// Converte a extensão para minúsculo
        $extensao = strtolower($extensao);

// Somente imagens, .jpg;.jpeg;.gif;.png
// Aqui eu enfileiro as extensões permitidas e separo por ';'
// Isso serve apenas para eu poder pesquisar dentro desta String
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
// Cria um nome único para esta imagem
// Evita que duplique as imagens no servidor.
// Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid(time()) . '.' . $extensao;

// Concatena a pasta com o nome
            $destino_imagem_home = '../../files/' . $novoNome;

// tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino_imagem_home)) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino_imagem_home . '</strong><br />';
                echo ' < img src = "' . $destino_imagem_home . '" />';
                echo $sql = "INSERT INTO `imagem`(`id_imovel`, `tipo`, `diretorio`) VALUES ('$idInserido','imagem_home','$destino_imagem_home')";
                if (mysqli_query($conexao, $sql) or die(mysqli_error($conexao))) {
                    
                }
            } else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        } else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    } else
        echo 'Você não enviou nenhum arquivo!';


//upload de multiplas images

    $countfiles = count($_FILES['imagens']['name']);
    $arquivo = $_FILES['imagens'];

// Carregar todos os arquivos
    for ($i = 0; $i < $countfiles; $i++) {

// Pega a extensão
        $extensao = pathinfo($arquivo['name'][$i], PATHINFO_EXTENSION);

// Converte a extensão para minúsculo
        $extensao = strtolower($extensao);

        $novoNome = uniqid(time()) . '.' . $extensao;

// Concatena a pasta com o nome
        $destino_imagem = '../../files/' . $novoNome;

        echo '<pre>';
        if (move_uploaded_file($arquivo['tmp_name'][$i], $destino_imagem)) {
            echo "Arquivo válido e enviado com sucesso.\n";
            echo $sql = "INSERT INTO `imagem`(`id_imovel`, `tipo`, `diretorio`) VALUES ('$idInserido','imagem','$destino_imagem')";
            if (mysqli_query($conexao, $sql) or die(mysqli_error($conexao))) {
                
            }
        } else {
            echo "Possível ataque de upload de arquivo!\n";
        }

        echo 'Aqui está mais informações de debug:';
        print_r($_FILES);

        print "</pre>";
    }
}



header("location: ../interaction/admin_imovel.php");
//echo "location: ../interaction/admin_imovel.php?codigo='$idInserido'";