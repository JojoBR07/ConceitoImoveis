<?php
include ("header.php");
require_once('../validation/connect.php');

$sql = "SELECT * FROM `artigos` ORDER BY `id` DESC";
$row = mysqli_query($conexao, $sql);
?>

<main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Nossos Artigos</h1>
                        <span class="color-text-a"> 
                            <span class="color-b"><b><?php echo mysqli_num_rows($row); ?></b></span> 
                            Artigos Disponíveis
                        </span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Artigos
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- =======  Blog ======= -->
    <section class="news-grid grid">
        <div class="container">
            <div class="row">
                
                <?php if (mysqli_num_rows($row) > 0) { ?>
                    <?php foreach ($row as $registro) { ?>
                        <div class="col-md-4">
                            <div class="card-box-b card-shadow news-box">
                                <div class="img-box-b">
                                    <img src="<?php echo $registro['capa'];?>" alt="" class="img-b img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-header-b">
                                        <div class="card-category-b">
                                            <a href="blog-single.php?codigo=<?php echo $registro['id']; ?>" class="category-b"><?php echo $registro['categoria']; ?></a>
                                        </div>
                                        <div class="card-title-b">
                                            <h2 class="title-2">
                                                <a href="blog-single.php?codigo=<?php echo $registro['id']; ?>"><?php echo $registro['titulo']; ?>
                                                    <br></a>
                                            </h2>
                                        </div>
                                        <div class="card-date">
                                            <span class="date-b"><?php echo $registro['data']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
                
            </div>
            <!--
            <div class="row">
                <div class="col-sm-12">
                    <nav class="pagination-a">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <span class="ion-ios-arrow-back"></span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item next">
                                <a class="page-link" href="#">
                                    <span class="ion-ios-arrow-forward"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            -->
        </div>
    </section><!-- End Blog -->
</main><!-- End #main -->

<?php
include ("footer.php");
?>