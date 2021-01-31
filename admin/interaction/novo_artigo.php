<?php
include ("header.php");
?>

<!-- ##########################################################################
// Pagina de seleção de impressão: PRETO OU COLORIDO          
############################################################################-->

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Adicionar Novo Artigo</h1>
        <p class="mb-4">O sistema de administrador é um serviço que possibilita ao usuário realizar o gerenciamento do site Conceito Imóveis. </p>                        

        <form action="../execution/add_artigo.php" enctype="multipart/form-data" method="POST">

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
                                <input type="text" name="titulo" class="form-control" placeholder="Título do Artigo..." required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub-Título</label>
                                <input type="text" name="subtitulo" class="form-control" placeholder="Sub-Título do Artigo..." required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Autor</label>
                                <input type="text" name="autor" class="form-control"  placeholder="Ex:. Eraclides Santos" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Categoria</label>
                                <input type="text" name="categoria" class="form-control" placeholder="Ex:. Decoração" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Data de Publicação</label>
                                <input type="date" name="data" class="form-control" placeholder="12/10/2020" required="">
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
                            <textarea type="text" name="descricao" class="form-control" placeholder="insira um breve resumo para o artigo..." required=""></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Corpo/Texto do Artigo</label>
                            <textarea type="text" name="texto" class="form-control" placeholder="Insira o texto que será exibido no artigo..." required=""></textarea>
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
                            <input type="file" name="imagem_capa" class="form-control" accept="image/png, image/jpeg, image/jpg" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Imagem do Artigo</label>
                            <input type="file" name="imagem_artigo" class="form-control" accept="image/png, image/jpeg, image/jpg" required="">
                        </div>
                    </div>
                    <hr>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="row no-gutters align-items-center">

                                <!-- Botão Cancelar -->
                                <div class="col-auto">
                                    <a href="index.php" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-times"></i>
                                        </span>
                                        <span class="text">Cancelar</span>
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
                            <button type="submit" name="enviar" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Adicionar Artigo</span>
                            </button>
                        </div><!-- fim do bostão Cobrança --> 
                    </div><!-- do bo-tão adicionar --> 
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