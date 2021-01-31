<?php

        ##########################################################################
        // Pagina Responsavel por verificar se o usuário ja está logado no sistema
        // ou está tentando acessalo sem informar suas credenciais na pagina de
        // login.        
        ############################################################################

    error_reporting(E_ALL);

    /**
     * 
     * SESSION_START indica ao php que nesta pagina será utilizado funções
     * envolvendo sessão.
     * 
     */
    session_start();

        if (!isset($_SESSION['login']) 
            || $_SESSION['login'] != 'LOGIN_EFETUADO') {
            $msg = urlencode('Efetue login para continuar!');
            header("location: ../interaction/login.php?retorno=$msg");
            exit;
        }
?>