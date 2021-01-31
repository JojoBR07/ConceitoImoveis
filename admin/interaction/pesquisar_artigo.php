<?php
include ("header.php");

require_once ('../validation/connect.php');

if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) {

    if (($_GET['pesquisar']) == "imovel") {
        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM `imovel` WHERE `id` = '$codigo'";
        $row = mysqli_query($conexao, $sql);
    } else if (($_GET['pesquisar']) == "artigo") {

        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM `artigos` WHERE `id` = '$codigo'";
        $row = mysqli_query($conexao, $sql);
    } else if (($_GET['pesquisar']) == "listar_imovel") {

        $sql = "SELECT * FROM `imovel` WHERE 1";
        $row = mysqli_query($conexao, $sql);
    } else {

        $sql = "SELECT * FROM `artigos` WHERE 1";
        $row = mysqli_query($conexao, $sql);
    }
}
?>

<!-- ##########################################################################
// Pagina de seleção de impressão: PRETO OU COLORIDO          
############################################################################-->

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pesquisar Artigo</h1>
    <p class="mb-4">O sistema de administrador é um serviço que possibilita ao usuário realizar o gerenciamento do site Conceito Imóveis. </p>                        

    <form action="pesquisar_artigo.php" enctype="multipart/form-data" method="GET">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Código do Artigo:</h6>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Código do Artigo</label>
                        <input class="form-control" placeholder="Ex:. 34829" type="text" name="codigo"/>  
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
                                        <i class="fas fa-archive"></i>
                                    </span>
                                    <span class="text">Listar Todos</span>
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
                        <button type="submit" name="pesquisar" value="artigo" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-search"></i>
                            </span>
                            <span class="text">Pesquisar Artigo</span>
                        </button>
                    </div><!-- fim do bostão Cobrança --> 
                </div><!-- do botão deletar --> 
            </div>
    </form>
</div>
<?php if (isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) { ?>
    <!-- Tabela para listagem -->  
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Artigos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Data</th>
                            <th>Categoria</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <!--
                        /*
                        |--------------------------------------------------------------------------
                        | Listagem da Fila de Impressão
                        |--------------------------------------------------------------------------
                        |
                        | Os seguintes códigos php realizam de forma sequêncial os seguintes processos:
                        |   > O programa testa se a consulta no Banco de dados feita no inicio
                        |   da pagina teve algum retorno, caso tenha retornado algum registro
                        |   função mysqli_num_rows irá identficar quantos registros foram retornados.
                        |   > Em seguida, o programa faz uma estrutura de repetição utilizando
                        |   o foreach, onde será listado todos os registros da consuta no Banco de Dados 
                        |   armazenados na variavel retorno.
                        |   > Essa listagem será apresentada para o usuário atravez de um tabela
                        |--------------------------------------------------------------------------
                        */
                    -->

                    <?php if (mysqli_num_rows($row) > 0) { ?>
                        <?php foreach ($row as $registro) { ?>
                            <tr>
                                <td><?php echo $registro['id']; ?></td>
                                <td><?php echo $registro['titulo']; ?></td>
                                <td><?php echo $registro['autor'] ?></td>
                                <td><?php echo $registro['data']; ?></td>
                                <td><?php echo $registro['categoria']; ?></td>
                                <td>
                            <center>
                                <a href="../interaction/admin_artigo.php?codigo=<?php echo $registro['id']; ?>" class="btn btn-success btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="../execution/delete_artigo.php?codigo=<?php echo $registro['id']; ?>" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </center>
                            </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php } ?>
</div>
</div>
<?php
include ("footer.php");
?>

