<?php
include ("header.php");
require_once('../validation/connect.php');

if (isset($_POST['pesquisar'])) {
    if (isset($_POST['codigo']) and ( $_POST['codigo']) != "") {
        $codigo = $_POST['codigo'];
        $sql = "SELECT * FROM `imovel` WHERE `id` = '$codigo'";
        $row = mysqli_query($conexao, $sql);
    } else {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $where = Array();

            $tipo = $_POST['tipo'];
            $cidade = $_POST['cidade'];
            $quartos = $_POST['quartos'];
            $banheiros = $_POST['banheiros'];
            $garagem = $_POST['garagem'];
            $valor = $_POST['valor'];


            if (($tipo) and ( $tipo != "Todos os tipos")) {
                $where[] = " `disponibilidade` = '{$tipo}'";
            }
            if (($cidade) and ( $cidade != "Todas as Cidades")) {
                $where[] = " `cidade` = '{$cidade}'";
            }
            if (($quartos) and ( $quartos != "Qualquer") and ( $quartos != "4 ou Mais")) {
                $where[] = " `quartos` = '{$quartos}'";
            } else if (($quartos == "4 ou Mais")) {
                $where[] = " `quartos` >= '{$quartos}'";
            }
            if (($banheiros) and ( $banheiros != "Qualquer") and ( $banheiros != "4 ou Mais")) {
                $where[] = " `banheiros` = '{$banheiros}'";
            } else if ($banheiros == "4 ou Mais") {
                $where[] = " `banheiros` >= '{$banheiros}'";
            }
            if (($garagem) and ( $garagem != "Qualquer") and ( $garagem != "4 ou Mais")) {
                $where[] = " `garagem` = '{$garagem}'";
            } else if ($garagem == "4 ou Mais") {
                $where[] = " `garagem` >= '{$banheiros}'";
            }
            if (($valor) and ( $valor != "Ilimitado")) {
                $valor = str_replace(',', '', $valor);
                $valor = str_replace('R$', '', $valor);
                $where[] = " `valor` <= '{$valor}'";
            }

            $sql = "SELECT * FROM `imovel`";
            if (sizeof($where) and sizeof($where == 0)) {
                $sql .= ' WHERE ' . implode(' AND ', $where);

                echo $sql; //execute a query aqui

                $row = mysqli_query($conexao, $sql);
            } else {
                $sql = "SELECT * FROM `imovel` WHERE 1";
                $row = mysqli_query($conexao, $sql);
            }

            //a cargo do leitor melhorar o filtro anti injection
            function filter($str) {
                return addslashes($str);
            }

            function getPost($key) {
                return isset($_POST[$key]) ? filter($_POST[$key]) : null;
            }

        }
    }
} else {
    $sql = "SELECT * FROM `imovel` WHERE 1";
    $row = mysqli_query($conexao, $sql);
}
?>
<main id="main">

    <!-- ======= Cabeçalho Simples ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Nossas Propriedades</h1>
                        <span class="color-text-a"> 
                            <span class="color-b"><b><?php echo mysqli_num_rows($row); ?></b></span> 
                            Propriedades para Locação e Venda
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
                                Propriedades
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- fim Cabeçalho
              
              
              Simples-->
    <!-- ======= Grid de Propriedades ======= -->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                <!--
                <div class="col-sm-12">
                    <div class="grid-option">
                        <form>
                            <select class="custom-select">
                                <option selected>Todas</option>
                                <option value="1">Mais Recentes</option>
                                <option value="2">Para Locação</option>
                                <option value="3">Para Venda</option>
                            </select>
                        </form>
                    </div>
                </div>
                -->

                <!--
                <div class="col-md-4">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="../../libs/assets/img/property-6.jpg" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="property-single.html">206, Centro
                                            <br /> Rua Presidente Vargas</a>
                                    </h2>
                                </div>
                                <div class="card-body-a">
                                    <div class="price-box d-flex">
                                        <span class="price-a">Aluguel | R$ 12.000</span>
                                    </div>
                                    <a href="#" class="link-a">Clique aqui para ver
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Área</h4>
                                            <span>340m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Quartos</h4>
                                            <span>2</span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Banheiros</h4>
                                            <span>4</span>
                                        </li>
                                        <li>
                                            <h4 class="card-info-title">Garagens</h4>
                                            <span>1</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->


                <?php if (mysqli_num_rows($row) > 0) { ?>
                    <?php foreach ($row as $registro) { ?>
                        <div class="col-md-4">
                            <?php
                            $id = $registro['id'];

                            $sql_capa = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'capa' LIMIT 1";
                            $row_capa = mysqli_query($conexao, $sql_capa);
                            $resgistro_capa = mysqli_fetch_assoc($row_capa);
                            
                            ?>
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="<?php echo $resgistro_capa['diretorio'];?>" alt="" class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <a href="propriedade-single.php?codigo=<?php echo $registro['id'] ?>" class="link-a"><?php echo $registro['cidade'] ?> - <?php echo $registro['estado']; ?></a>
                                            <h2 class="card-title-a">
                                                <?php echo $registro['titulo'] ?></a>
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a"><?php echo $registro['disponibilidade']; ?> | <?php echo number_format($registro['valor'],2,",","."); ?></span>
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
                } else {
                    echo "<label>Nenhum imovel disponível para os filtros selecionados</label>";
                }
                ?>

            </div>

        </div>
    </section><!-- Fim Grid de Propriedades-->

</main><!-- End #main -->

<?php
include ("footer.php");
?>