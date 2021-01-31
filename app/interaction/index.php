<?php
include ("header.php");
include ("../execution/dados_home.php");

$sql = "SELECT * FROM `imovel` ORDER BY `id` DESC LIMIT 4";
$row = mysqli_query($conexao, $sql);

$sql2 = "SELECT * FROM `artigos` ORDER BY `id` DESC LIMIT 4";
$row2 = mysqli_query($conexao, $sql2);

$sql_imoveis = "SELECT * FROM `home` WHERE 1";
$row_imoveis = mysqli_query($conexao, $sql_imoveis);
$resgistro = mysqli_fetch_assoc($row_imoveis);

$id1 = $resgistro['imovel_1'];
$id2 = $resgistro['imovel_2'];
$id3 = $resgistro['imovel_3'];

$sql_imoveis = "SELECT * FROM `imovel` WHERE `id` = '$id1'";
$row_imoveis = mysqli_query($conexao, $sql_imoveis);
$registro1 = mysqli_fetch_assoc($row_imoveis);
$sql_home = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id1' and `tipo` = 'imagem_home' LIMIT 1";
$row_home = mysqli_query($conexao, $sql_home);
$registro_home = mysqli_fetch_assoc($row_home);

$sql_imoveis = "SELECT * FROM `imovel` WHERE `id` = '$id2'";
$row_imoveis = mysqli_query($conexao, $sql_imoveis);
$registro2 = mysqli_fetch_assoc($row_imoveis);
$sql_home = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id2' and `tipo` = 'imagem_home' LIMIT 1";
$row_home = mysqli_query($conexao, $sql_home);
$registro_home2 = mysqli_fetch_assoc($row_home);

$sql_imoveis = "SELECT * FROM `imovel` WHERE `id` = '$id3'";
$row_imoveis = mysqli_query($conexao, $sql_imoveis);
$registro3 = mysqli_fetch_assoc($row_imoveis);
$sql_home = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id3' and `tipo` = 'imagem_home' LIMIT 1";
$row_home = mysqli_query($conexao, $sql_home);
$registro_home3 = mysqli_fetch_assoc($row_home);
?>

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo $registro_home['diretorio'] ?>)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top"><?php echo $registro1['endereco'] ?>, nº <?php echo $registro1['numero'] ?>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b"><?php echo $registro1['cidade'] ?> </span> - <?php echo $registro1['estado'] ?>
                                        <br> <?php echo $registro1['titulo'] ?></h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="propriedade-single.php?codigo=<?php echo $registro1['id'] ?>"><span class="price-a"><?php echo $registro1['disponibilidade'] ?> | R$ <?php echo number_format($registro1['valor'], 2, ",", "."); ?></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo $registro_home2['diretorio'] ?>)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top"><?php echo $registro2['endereco'] ?>, nº <?php echo $registro2['numero'] ?>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b"><?php echo $registro2['cidade'] ?> </span> - <?php echo $registro2['estado'] ?>
                                        <br> <?php echo $registro2['titulo'] ?></h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="propriedade-single.php?codigo=<?php echo $registro2['id'] ?>"><span class="price-a"><?php echo $registro2['disponibilidade'] ?> | R$ <?php echo number_format($registro2['valor'], 2, ",", "."); ?></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo $registro_home3['diretorio'] ?>)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top"><?php echo $registro3['endereco'] ?>, nº <?php echo $registro3['numero'] ?>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b"><?php echo $registro3['cidade'] ?> </span> - <?php echo $registro3['estado'] ?>
                                        <br> <?php echo $registro3['titulo'] ?></h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="propriedade-single.php?codigo=<?php echo $registro3['id'] ?>"><span class="price-a"><?php echo $registro3['disponibilidade'] ?> | R$ <?php echo number_format($registro3['valor'], 2, ",", "."); ?></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Intro Section -->

<main id="main"> 

    <!-- ======= Encontre o Lar Perfeito! ======= -->
    <section class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Encontre o <span class="color-b">Lar Perfeito!</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Venda</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Proporcionamos a você a realização desse sonho, adquirir um imóvel sempre 
                                envolve vários fatores, entre eles, financeiro e emocional. 
                                Estamos aqui para dar a segurança necessária nesse momento.
                            </p>
                             <br/> <br/>
                        </div>
                        <div class="card-footer-c">
                            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01">
                                <span class="fa fa-search" aria-hidden="true"></span>
                                Pesquisar Propriedades
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Locação</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Você encontrar o imóvel que caiba em seu orçamento e gosto muitas vezes leva muito tempo, 
                                oferecemos a você nossa plataforma e atendimento para facilitar sua vida nesse momento.
                            </p>
                            <br/> <br/> <br/>
                        </div>
                        <div class="card-footer-c">
                            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01">
                                <span class="fa fa-search" aria-hidden="true"></span>
                                Pesquisar Propriedades
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-exclamation"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Laçamentos</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Uma ótima oportunidade de investimento sempre foi o setor imobiliário, 
                                quando falamos em lançamento isso ainda se torna muito mais rentável
                                para quem pensa em valorizar seu dinheiro. Veja nossas unidades e entre em 
                                contato com nossos consultores.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01">
                                <span class="fa fa-search" aria-hidden="true"></span>
                                Pesquisar Propriedades
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Fim Encontre o Lar Perfeito! Sessão -->

    <!-- ======= Propriedades Mais Recentes Sessão ======= -->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Propriedades Mais Recentes</h2>
                        </div>
                        <div class="title-link">
                            <a href="propriedade-grid.php">Todas Propriedades
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                <?php if (mysqli_num_rows($row) > 0) { ?>
                    <?php foreach ($row as $registro) { ?>
                        <?php
                        $id = $registro['id'];

                        $sql_capa = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'capa' LIMIT 1";
                        $row_capa = mysqli_query($conexao, $sql_capa);
                        $resgistro_capa = mysqli_fetch_assoc($row_capa);
                        ?>
                        <div class="carousel-item-b">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="<?php echo $resgistro_capa['diretorio']; ?>" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <a href="propriedade-single.php?codigo=<?php echo $registro['id'] ?>" class="link-a"><?php echo $registro['cidade'] ?> - <?php echo $registro['estado'] ?></a>
                                            <h2 class="card-title-a">
                                                <?php echo $registro['titulo'] ?></a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a"><?php echo $registro['disponibilidade']; ?> | R$ <?php echo number_format($registro['valor'], 2, ",", "."); ?></span>
                                            </div>
                                            <a href="propriedade-single.php?codigo=<?php echo $registro['id'] ?>" class="link-a">Clique aqui para ver
                                                <span class="ion-ios-arrow-forward"></span>
                                            </a>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                                <li>
                                                    <h4 class="card-info-title">Área</h4>
                                                    <span><?php echo $registro['area_construida']; ?>m
                                                        <sup>2</sup>
                                                    </span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Quartos</h4>
                                                    <span><?php echo $registro['quartos']; ?></span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Banheiros</h4>
                                                    <span><?php echo $registro['banheiros']; ?></span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Garagens</h4>
                                                    <span><?php echo $registro['garagem']; ?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section><!-- Fim Propriedades Mais Recentes Sessão -->

    <!-- ======= Últimos Artigos Sessão ======= -->
    <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Últimos Artigos</h2>
                        </div>
                        <div class="title-link">
                            <a href="artigos.php">Todos os Artigos
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new-carousel" class="owl-carousel owl-theme">
                <?php if (mysqli_num_rows($row2) > 0) { ?>
                    <?php foreach ($row2 as $registro) { ?>
                        <div class="carousel-item-c">
                            <div class="card-box-b card-shadow news-box">
                                <div class="img-box-b">
                                    <img src="<?php echo $registro['capa']; ?>" alt="" class="img-b img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-header-b">
                                        <div class="card-category-b">
                                            <a href="blog-single.php?codigo=<?php echo $registro['id']; ?>" class="category-b"><?php echo $registro['categoria']; ?></a>
                                        </div>
                                        <div class="card-title-b">
                                            <h2 class="title-2">
                                                <a href="blog-single.php?codigo=<?php echo $registro['id']; ?>"><?php echo $registro['titulo']; ?>
                                                    <br> </a>
                                            </h2>
                                        </div>
                                        <div class="card-date">
                                            <span class="date-b"><?php echo $registro['data']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section><!-- Fim Últimos Artigos Sessão -->

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
    <br/>
    

</main><!-- End #main -->

<?php
include ("footer.php");
?>