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

<!-- ##########################################################################
// HEADER: Arquivo com os itens de menu que estaram presentes em todas as paginas do site
############################################################################-->

<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Painel de controle</title>

        <!-- Custom fonts for this template-->
        <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../libs/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="../libs/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Sidebar -->
            <!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-home"></i>
                    </div>

                    <div class="sidebar-brand-text mx-3 ">Conceito Imóveis<sup></sup></div>

                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Painel de Controle</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Ferramentas
                </div>

                <!-- Nav Item - Histórico -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-cog"></i>
                        <span>Administração</span></a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Admin Personalizado:</h6>
                            <a class="collapse-item" href="pesquisar_imovel.php">Administrar Imóveis</a>
                            <a class="collapse-item" href="pesquisar_artigo.php">Administrar Artigos</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Enviar Arquivo -->
                <li class="nav-item">
                    <a class="nav-link" href="pagina_home.php">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Página Home</span></a>
                </li>



                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Adicionar
                </div>

                <!-- Nav Item - Fila de Impressão -->
                <li class="nav-item">
                    <a class="nav-link" href="nova_propriedade.php">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Propriedades</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="novo_artigo.php">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Artigos</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Adicional
                </div>

                <!-- Nav Item - Fila de Impressão -->
                <li class="nav-item">
                    <a class="nav-link" href="help.php">
                        <i class="fas fa-fw fa-question"></i>
                        <span>Ajuda</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Pefil e Matrícula -->
                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2  d-lg-inline text-gray-600 small"><?php echo ($_SESSION['user']); ?></span>
                                    <i class="fas fa-fw fa-user"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->