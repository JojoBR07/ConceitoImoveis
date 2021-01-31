<?php
include ("header.php");
require_once('../validation/connect.php');

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM `artigos` WHERE `id` = '$codigo'";
    $row = mysqli_query($conexao, $sql);
    $resgistro = mysqli_fetch_assoc($row);
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
                        <span class="color-text-a"> 
                            <span class="color-b"><b><?php echo $resgistro['sub_titulo']; ?></b></span> 

                        </span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="artigos.php">Artigos</a>
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

    <!-- =======  Blog ======= -->
    <!-- ======= Blog Single ======= -->
    <section class="news-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="news-img-box">
                        <img src="<?php echo $resgistro['imagem']; ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="post-information">
                        <ul class="list-inline text-center color-a">
                            <li class="list-inline-item mr-2">
                                <strong>Autor: </strong>
                                <span class="color-text-a"><?php echo $resgistro['autor']; ?></span>
                            </li>
                            <li class="list-inline-item mr-2">
                                <strong>Categoria: </strong>
                                <span class="color-text-a"><?php echo $resgistro['categoria']; ?></span>
                            </li>
                            <li class="list-inline-item">
                                <strong>Data: </strong>
                                <span class="color-text-a"><?php echo $resgistro['data']; ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="post-content color-text-a">
                        <p class="post-intro">
                            <?php echo $resgistro['descicao']; ?>
                        </p>
                        <p>
                            <?php echo $resgistro['texto']; ?>
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section><!-- End Blog Single-->

</main><!-- End #main -->

<?php
include ("footer.php");
?>