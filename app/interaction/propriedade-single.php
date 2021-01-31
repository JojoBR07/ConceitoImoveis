<?php
include ("header.php");

require_once ('../validation/connect.php');

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM `imovel` WHERE `id` = '$codigo'";
    $row = mysqli_query($conexao, $sql);
    $resgistro = mysqli_fetch_assoc($row);

    $sql_img = "SELECT * FROM `imagem` WHERE `id_imovel` = '$codigo' and `tipo` = 'imagem'";
    $row_img = mysqli_query($conexao, $sql_img);
}
?>

<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single"><?php echo $resgistro['titulo']; ?></h1>
                        <span class="color-text-a"><?php echo $resgistro['subtitulo']; ?></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="propriedade-grid.php">Propriedades</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo $resgistro['titulo']; ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        <?php if (mysqli_num_rows($row_img) > 0) { ?>
                            <?php foreach ($row_img as $registro_img) { ?>
                                <div class="carousel-item-b">
                                    <img src="<?php echo $registro_img['diretorio']; ?>" alt="">
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">R$</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c"><?php echo number_format($resgistro['valor'],2,",","."); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Detalhes</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Propriedade ID:</strong>
                                            <span><?php echo $resgistro['id']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Endereço:</strong>
                                            <span><?php echo $resgistro['endereco']; ?>, <?php echo $resgistro['numero']; ?> <?php echo $resgistro['complemento']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Cidade:</strong>
                                            <span><?php echo $resgistro['cidade']; ?> - <?php echo $resgistro['estado']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Tipo:</strong>
                                            <span><?php echo $resgistro['tipo']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Disponibilidade:</strong>
                                            <span><?php echo $resgistro['disponibilidade']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Área Construida:</strong>
                                            <span><?php echo $resgistro['area_construida']; ?>m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Terreno:</strong>
                                            <span><?php echo $resgistro['terreno']; ?>m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Banheiros:</strong>
                                            <span><?php echo $resgistro['banheiros']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Quartos:</strong>
                                            <span><?php echo $resgistro['quartos']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Suítes:</strong>
                                            <span><?php echo $resgistro['suites']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Salas:</strong>
                                            <span><?php echo $resgistro['salas']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Cozinhas:</strong>
                                            <span><?php echo $resgistro['cozinhas']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Garagem:</strong>
                                            <span><?php echo $resgistro['garagem']; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Descrição</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    <?php echo $resgistro['descricao']; ?>
                                </p>
                            </div>
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Comodidades e observações</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    <?php echo $resgistro['observacoes']; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row section-t3">
                    <div class="col-sm-12">
                        <div class="title-box-d">
                            <h3 class="title-d">Contato</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <img src="../../libs/assets/img/corretora.jpeg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property-agent">
                            <h4 class="title-agent">Equipe Conceito Imóveis</h4>
                            <p class="color-text-a">
                               Eraclides Santos, corretor profissional (Creci) e Ana Mattos atuam com o objetivo de realizar a intermediação imobiliária entre 
                               o comprador e o vendedor, fazendo com que a transação ocorra da melhor forma para ambos.
                            </p>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between">
                                    <strong>Celular:</strong>
                                    <span class="color-text-a">(+55) 8149-0863</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Email:</strong>
                                    <span class="color-text-a">contato@conceito-imoveis.com</span>
                                </li>
                            </ul>
                            <div class="socials-a">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/ana.mattosdossantos">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="">
                                            <i class="fa fa-twitter" aria-hidden="False"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-instagram" aria-hidden="false"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="">
                                            <i class="fa fa-pinterest-p" aria-hidden="false"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="">
                                            <i class="fa fa-dribbble" aria-hidden="false"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="property-contact">
                            <form class="form-a">
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Nome *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="E-mail *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <textarea id="textMessage" class="form-control" placeholder="Mensagem *" name="message" cols="45" rows="8" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-a">Enviar Mensagem</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </section><!-- End Property Single-->

</main><!-- End #main -->



<?php
include ("footer.php");
?>