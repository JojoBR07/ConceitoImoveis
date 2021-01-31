<?php
include ("header.php");

require_once('../validation/connect.php');
$sql = "SELECT * FROM `home` LIMIT 1";
$row = mysqli_query($conexao, $sql);
$registro = mysqli_fetch_assoc($row);
?>


<!-- ##########################################################################
// Pagina de seleção de impressão: PRETO OU COLORIDO          
############################################################################-->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Página Home</h1>
    <p class="mb-4">O sistema de administrador é um serviço que possibilita ao usuário realizar o gerenciamento do site Conceito Imóveis. </p>                        

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Configurar Página Home:</h6>
        </div>
        <div class="card-body">
            <form action="../execution/edit_pagina_home.php" enctype="multipart/form-data" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <div class="card text-center">
                            <div class="card-header">
                                Facebook
                            </div>
                            <div class="card-body">
                                <input class="form-control" value="<?php echo $registro['facebook'] ?>" type="text" name="facebook" placeholder="Insira o link do Facebook..." required="">
                            </div>
                            <div class="card-footer text-muted">
                                <a type="button" class="bnt-primary" href="<?php echo $registro['facebook'] ?>">
                                    Acessar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="card text-center">
                            <div class="card-header">
                                Instagram
                            </div>
                            <div class="card-body">
                                <input class="form-control" value="<?php echo $registro['instagram'] ?>" type="text" name="instagram" placeholder="Insira o link do Instagram..." required="">
                            </div>
                            <div class="card-footer text-muted">
                                <a type="button" class="bnt-primary" href="<?php echo $registro['instagram'] ?>">
                                    Acessar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="card text-center">
                            <div class="card-header">
                                Linkedin
                            </div>
                            <div class="card-body">
                                <input class="form-control" value="<?php echo $registro['linkedin'] ?>" type="text" name="linkedin" placeholder="Insira o link do Linkedin..." required="">
                            </div>
                            <div class="card-footer text-muted">
                                <a type="button" class="bnt-primary" href="<?php echo $registro['linkedin'] ?>">
                                    Acessar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="card text-center">
                            <div class="card-header">
                                Twitter
                            </div>
                            <div class="card-body">
                                <input class="form-control" value="<?php echo $registro['twitter'] ?>" type="text" name="twitter" placeholder="Insira o link do Twitter..." required="">
                            </div>
                            <div class="card-footer text-muted">
                                <a type="button" class="bnt-primary" href="<?php echo $registro['twitter'] ?>">
                                    Acessar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Primeiro Imóvel</label>
                        <input class="form-control" name="imovel_1" value="<?php echo $registro['imovel_1']; ?>" required="">  </input>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Segundo Imóvel</label>
                        <input class="form-control" name="imovel_2" value="<?php echo $registro['imovel_2']; ?>" required="">  </input>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Terceiro Imóvel</label>
                        <input class="form-control" name="imovel_3" value="<?php echo $registro['imovel_3']; ?>" required="">  </input>
                    </div>
                </div>
                <hr>
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="row no-gutters align-items-center">

                            <!-- Botão Cancelar -->
                            <div class="col-auto">
                                <a href="index.php" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-times"></i>
                                    </span>
                                    <span class="text">Voltar</span>
                                </a>
                            </div>
                            <!-- fim do bo-tão cancelar --> 

                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão adicionar -->
                    <div class="col-auto">
                        <button type="submit" name="salvar" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-file"></i>
                            </span>
                            <span class="text">Salvar Alterações</span>
                        </button>
                    </div><!-- fim do bostão Cobrança --> 
                </div><!-- do botão deletar --> 
            </form>
        </div>
    </div>

</div>
</div>
<?php
include ("footer.php");
?>

