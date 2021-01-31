<?php
include ("header.php");
require_once('../validation/connect.php');

if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM `imovel` WHERE `id` = '$codigo'";
    $row = mysqli_query($conexao, $sql);
    $resgistro = mysqli_fetch_assoc($row);

    $id = $resgistro['id'];

    $sql_capa = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'capa' LIMIT 1";
    $row_capa = mysqli_query($conexao, $sql_capa);
    $resgistro_capa = mysqli_fetch_assoc($row_capa);

    $sql_home = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'imagem_home' LIMIT 1";
    $row_home = mysqli_query($conexao, $sql_home);
    $resgistro_home = mysqli_fetch_assoc($row_home);

    $sql_img = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'imagem'";
    $row_img = mysqli_query($conexao, $sql_img);
} else {

    $sql = "SELECT * FROM `imovel` ORDER BY `id` DESC LIMIT 1";
    $row = mysqli_query($conexao, $sql);
    $resgistro = mysqli_fetch_assoc($row);

    $id = $resgistro['id'];

    $sql_capa = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'capa' LIMIT 1";
    $row_capa = mysqli_query($conexao, $sql_capa);
    $resgistro_capa = mysqli_fetch_assoc($row_capa);

    $sql_home = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'imagem_home' LIMIT 1";
    $row_home = mysqli_query($conexao, $sql_home);
    $resgistro_home = mysqli_fetch_assoc($row_home);

    $sql_img = "SELECT * FROM `imagem` WHERE `id_imovel` = '$id' and `tipo` = 'imagem'";
    $row_img = mysqli_query($conexao, $sql_img);
}
?>

<!-- ##########################################################################
// Pagina de seleção de impressão: PRETO OU COLORIDO          
############################################################################-->


<!-- Image card -->
<style>
    .demo-card-image.mdl-card {
        height: 250px;
        position: relative;
        width: 100%;
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
        <h1 class="h3 mb-4 text-gray-800">Informações da Propriedade</h1>
        <p class="mb-4">O sistema de administrador é um serviço que possibilita ao usuário realizar o gerenciamento do site Conceito Imóveis. </p>                        

        <form action="../execution/deletar_imovel.php.php" enctype="multipart/form-data" name="adicionar_propriedade" method="POST">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Código da Propriedade:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Proprietario</label>
                            <input class="form-control" disabled="" type="text" name="codigo" value="<?php echo $resgistro['id']; ?>"/>  
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulário com dados do proprietário -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dados do Proprietário:</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Proprietario</label>
                                        <label class="form-control"> <?php echo $resgistro['proprietario']; ?> </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>E-Mail</label>
                                        <label class="form-control"> <?php echo $resgistro['email']; ?> </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Fone/Whatsapp</label>
                                        <label class="form-control"> <?php echo $resgistro['fone']; ?> </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Profissão</label>
                                        <label class="form-control"> <?php echo $resgistro['profissao']; ?> </label>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Endereço da Propriedade:</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Cidade</label>
                                    <label class="form-control"> <?php echo $resgistro['cidade']; ?> </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Estado</label>
                                    <label class="form-control"> <?php echo $resgistro['estado']; ?> </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>CEP</label>
                                    <label class="form-control"> <?php echo $resgistro['cep']; ?> </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Número</label>
                                    <label class="form-control"> <?php echo $resgistro['numero']; ?> </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Complemento</label>
                                    <label class="form-control"> <?php echo $resgistro['complemento']; ?> </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Endereço</label>
                                    <label class="form-control"> <?php echo $resgistro['endereco']; ?> </label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bairro</label>
                                    <label class="form-control"> <?php echo $resgistro['bairro']; ?> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dados da Propriedade:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Situação</label>
                            <label class="form-control"> <?php echo $resgistro['situacao']; ?> </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo</label>
                            <label class="form-control"> <?php echo $resgistro['tipo']; ?> </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Disponibilidade</label>
                            <label class="form-control"> <?php echo $resgistro['disponibilidade']; ?> </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Financiável</label>
                            <label class="form-control"> <?php echo $resgistro['financiavel']; ?> </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Valor do Imóvel</label>
                            <label class="form-control"> <?php echo $resgistro['valor']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>IPTU Anual</label>
                            <label class="form-control"> <?php echo $resgistro['iptu']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Valor do Condomínio</label>
                            <label class="form-control"> <?php echo $resgistro['condominio']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Terreno(m²)</label>
                            <label class="form-control"> <?php $resgistro['terreno']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Área Construida(m²)</label>
                            <label class="form-control"> <?php echo $resgistro['area_construida']; ?> </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Quartos</label>
                            <label class="form-control"> <?php echo $resgistro['quartos']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Banheiros</label>
                            <label class="form-control"> <?php echo $resgistro['banheiros']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Suítes</label>
                            <label class="form-control"> <?php echo $resgistro['suites']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Salas</label>
                            <label class="form-control"> <?php echo $resgistro['salas']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Cozinhas</label>
                            <label class="form-control"> <?php echo $resgistro['cozinhas']; ?> </label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Garagens (Qts Carros)</label>
                            <label class="form-control"> <?php echo $resgistro['garagem']; ?> </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dados de Exibição:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Título do Anúncio</label>
                            <label class="form-control"> <?php echo $resgistro['titulo']; ?> </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sub-Título do Anúncio</label>
                            <label class="form-control"> <?php echo $resgistro['subtitulo']; ?> </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Descrição</label>
                            <textarea class="form-control"> <?php echo $resgistro['descricao']; ?> </textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Comodidades/Observações</label>
                            <textarea class="form-control"> <?php echo $resgistro['observacoes']; ?> </textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Imagem de Capa</label>
                            <div class="card bg-dark text-white">
                                <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url('<?php echo $resgistro_capa['diretorio']; ?>') center / cover;">
                                    <div class="mdl-card__title mdl-card--expand"></div>
                                    <div class="mdl-card__actions">
                                        <span class="demo-card-image__filename"><?php echo $resgistro_capa['diretorio']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Imagem Para Página Home</label>
                            <div class="card bg-dark text-white">
                                <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url('<?php echo $resgistro_home['diretorio']; ?>') center / cover;">
                                    <div class="mdl-card__title mdl-card--expand"></div>
                                    <div class="mdl-card__actions">
                                        <span class="demo-card-image__filename"><?php echo $resgistro_home['diretorio']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/> 
                    <div class="form-row">
                        <?php if (mysqli_num_rows($row_img) > 0) { ?>
                            <?php foreach ($row_img as $registro_img) { ?>
                                <div class="form-group col-md-3">
                                    <label>Imagens da Propriedade</label>
                                    <div class="card" style="">
                                        <div class="card bg-dark text-white">
                                            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url('<?php echo $registro_img['diretorio']; ?>') center / cover;">
                                                <div class="mdl-card__title mdl-card--expand"></div>
                                                <div class="mdl-card__actions">
                                                    <span class="demo-card-image__filename"><?php echo $registro_img['diretorio']; ?></span>
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
</
                    <hr>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="row no-gutters align-items-center">

                                <!-- Botão Cancelar -->
                                <div class="col-auto">
                                    <a href="pesquisar_imovel.php?pesquisar=listar_imovel" class="btn btn-primary btn-icon-split">
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
                            <a href="../execution/deletar_imovel.php?codigo=<?php echo $id; ?>" name="deletar" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Excluir Propriedade</span>
                            </a>
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

