<?php

        ##########################################################################
        // Pagina Responsavel por finalizar a sessão do usuario          
        ############################################################################

    /**
     * 
     * SESSION_START indica ao php que nesta pagina será utilizado funções
     * envolvendo sessão.
     * 
     */
    session_start();
    
    /**
     * 
     * SESSION_DESTROY  força o PHP a finalizar ou destruir todas as
     * sessões iniciadas pelo usuário
     * 
     */
    session_destroy();
    
            #session_unset($_SESSION);
            #$_SESSION['login'] = '';
            #$_SESSION['user'] = '';
    
    /**
     * 
     * HEADER redireciona o usuario para uma pagina especifica, neste caso,
     * o usuario está sendo direcionado para a pagina de login do sistema
     * 
     */
    header("location: login.php");
    
    exit();