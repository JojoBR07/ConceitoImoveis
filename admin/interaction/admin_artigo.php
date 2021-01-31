<?php
include ("header.php");

require_once('../validation/connect.php');

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM `artigos` WHERE `id` = '$codigo'";
    $row = mysqli_query($conexao, $sql);
    $resgistro = mysqli_fetch_assoc($row);
} else {

    $sql = "SELECT * FROM `artigos` ORDER BY `id` DESC LIMIT 1";
    $row = mysqli_query($conexao, $sql);
    $resgistro = mysqli_fetch_assoc($row);
}
?>

<!-- ##########################################################################
// Pagina de seleção de impressão: PRETO OU COLORIDO          
############################################################################-->


<!-- Image card -->
<style>
    .demo-card-image.mdl-card {
        position: relative;
        width: 100%;
        height: 400px;
    }
    .demo-card-image > .mdl-card__actions {
        height: 52px;
        padding: 16px;
        background: rgba(0, 0, 0, 0.2);
    }
    .demo-card-image__filename {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Informações do Artigo</h1>
        <p class="mb-4">O sistema de administrador é um serviço que possibilita ao usuário realizar o gerenciamento do site Conceito Imóveis. </p>                        

        <form action="../execution/delete_artigo.php" enctype="multipart/form-data" method="POST">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Código do Artigo:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Código</label>
                            <input class="form-control" disabled="" type="text" name="codigo" value="<?php echo $resgistro['id']; ?>"/>  
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulário com dados do Artigo -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dados do Artigo:</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Título</label>
                                <label class="form-control"> <?php echo $resgistro['titulo']; ?> </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub-Título</label>
                                <label class="form-control"> <?php echo $resgistro['sub_titulo']; ?> </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Autor</label>
                                <label class="form-control"> <?php echo $resgistro['autor']; ?> </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Categoria</label>
                                <label class="form-control"> <?php echo $resgistro['categoria']; ?> </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Data de Publicação</label>
                                <label class="form-control"> <?php echo $resgistro['data']; ?> </label>
                            </div>
                        </div>
                </div>
            </div>

            <!-- Formulário com corpo do Artigo -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Corpo do Artigo:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Descricão do Artigo</label>
                            <textarea type="text" class="form-control"> <?php echo $resgistro['descicao']; ?> </textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Corpo/Texto do Artigo</label>
                            <textarea type="text" class="form-control"> <?php echo $resgistro['texto']; ?> </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulário de exibição do Artigo -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dados de Exibição:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Imagem de Capa</label>
                            <div class="card bg-dark text-white">
                                <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url('../../files/161071792060019ae085b2c.jpg') center / cover;">
                                    <div class="mdl-card__title mdl-card--expand"></div>
                                    <div class="mdl-card__actions">
                                        <span class="demo-card-image__filename"><?php echo $resgistro['capa']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Imagem do Artigo</label>
                            <div class="card bg-dark text-white">
                                <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url('<?php echo $resgistro['imagem']; ?>') center / cover;">
                                    <div class="mdl-card__title mdl-card--expand"></div>
                                    <div class="mdl-card__actions">
                                        <span class="demo-card-image__filename"><?php echo $resgistro['imagem']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="row no-gutters align-items-center">

                                <!-- Botão Cancelar -->
                                <div class="col-auto">
                                    <a href="pesquisar_artigo.php?pesquisar=listar_artigo" class="btn btn-primary btn-icon-split">
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
                            <button type="submit" name="deletar" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Excluir Artigo</span>
                            </button>
                        </div><!-- fim do bostão Cobrança --> 
                    </div><!-- do botão deletar --> 
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include ("footer.php");
?>