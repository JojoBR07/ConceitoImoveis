<!DOCTYPE html>
<?php
//require_once('../validation/check_login.php');
?>

<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Conceito Imóveis</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../../libs/assets/img/logo.png" rel="icon">
        <link href="../../libs/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../../libs/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../libs/assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="../../libs/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../../libs/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../libs/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../../libs/assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: EstateAgency - v2.2.0
        * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>

        <!-- ======= Property Search Section ======= -->
        <div class="click-closed"></div>
        <!--/ Form Search Star /-->
        <div class="box-collapse">
            <div class="title-box-d">
                <h3 class="title-d">Pesquisar Propriedade</h3>
            </div>
            <span class="close-box-collapse right-boxed ion-ios-close"></span>
            <div class="box-collapse-wrap form">
                <form class="form-a" action="propriedade-grid.php" method="POST">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Código de Propriedade</label>
                                <input type="text" class="form-control form-control-lg form-control-a" name="codigo"  placeholder="Código">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Tipo</label>
                                <select class="form-control form-control-lg form-control-a" name="tipo" id="Type">
                                    <option>Todos os tipos</option>
                                    <option>Locação</option>
                                    <option>Venda</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <select class="form-control form-control-lg form-control-a" name="cidade" id="city">
                                    <option>Todas as Cidades</option>
                                    <option>Santiago</option>
                                    <option>Santa Maria</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="bedrooms">Banheiros</label>
                                <select class="form-control form-control-lg form-control-a" name="banheiros" id="bedrooms">
                                    <option>Qualquer</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4 ou Mais</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="garages">Garages</label>
                                <select class="form-control form-control-lg form-control-a" name="garagem" id="garages">
                                    <option>Qualquer</option>
                                    <option>0</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4 ou Mais</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="bathrooms">Quartos</label>
                                <select class="form-control form-control-lg form-control-a" name="quartos" id="bathrooms">
                                    <option>Qualquer</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4 ou Mais</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="price">Preço Máximo</label>
                                <select class="form-control form-control-lg form-control-a" name="valor" id="price">
                                    <option>Ilimitado</option>
                                    <option>R$50,000</option>
                                    <option>R$100,000</option>
                                    <option>R$200,000</option>
                                    <option>R$400,000</option>
                                    <option>R$500,000</option>
                                    <option>R$600,000</option>
                                    <option>R$700,000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="pesquisar" class="btn btn-b">Pesquisar Propriedade</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Property Search Section -->>

        <!-- ======= Header/Navbar ======= -->
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
            <div class="container">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a class="navbar-brand text-brand" href="index.php" style="font-size: 150%;">
                    <img src="../../libs/assets/img/logo.png" style="width: 40px;">
                    Conceito<span class="color-b">Imóveis</span></a>
                <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                    <span class="fa fa-search" aria-hidden="true"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="propriedade-grid.php">Propriedades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artigos.php">Artigos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contato.php">Contato</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                    <span class="fa fa-search" aria-hidden="true"></span>
                </button>
            </div>
        </nav><!-- End Header/Navbar -->

