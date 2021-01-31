<?php

##########################################################################
// Pagina Responsavel por iniciar uma sessão para o usuario apos ele informar 
// suas credenciais na pagina de login
// Esta pagina também verifica se as credeciais informadas pelo usuário
// existem no banco de dados         
############################################################################

/**
 * 
 * SESSION_START indica ao php que nesta pagina será utilizado funções
 * envolvendo sessão.
 * 
 */
session_start();


//conexao com o banco de dados
require_once('connect.php');

if (isset($_POST['user']) && !empty($_POST['user'])) {
    //pegar os dados do formulario (via post)
    $use = mysqli_real_escape_string($conexao, $_POST['user']);
    $use = strtolower($use);
    $pas = mysqli_real_escape_string($conexao, $_POST['password']);

    //testar com o banco de dados
    $sql = "select * from usuario where user='{$use}' and pass='{$pas}'";
    $retorno = mysqli_query($conexao, $sql) or die('ERRO...');
    $num = mysqli_num_rows($retorno);

    if ($num > 0) {
        $_SESSION['login'] = 'LOGIN_EFETUADO';
        $_SESSION['user'] = $use;
        header("location: ../interaction/index.php");
    } else {
        $_SESSION['LOGIN_NAO_EFETUADO'] = 'LOGIN_NAO_EFETUADO';
        $msg = urlencode('Dados invalidos!');
        header("location: ../interaction/login.php?retorno=$msg");
    }
} else {
    //o cara chegou aqui sem passar pelo form de login
    $_SESSION['LOGIN_NAO_EFETUADO'] = 'LOGIN_NAO_EFETUADO';
    $msg = 'Acesso negado - Efetue o login';
    header("location: ../interaction/login.php?retorno=$msg");
}
?>