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
        <h1 class="h3 mb-4 text-gray-800">Adicionar Nova Propriedade</h1>
        <p class="mb-4">O sistema de administrador é um serviço que possibilita ao usuário realizar o gerenciamento do site Conceito Imóveis. </p>                        

        <form action="../execution/add_imovel.php" enctype="multipart/form-data" name="adicionar_propriedade" method="POST">

            <!-- Formulário com dados do proprietário -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Dados do Proprietário:</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Proprietario</label>
                                <input type="text" name="proprietario" class="form-control" placeholder="Nome do Proprietário..." required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>E-Mail</label>
                                <input type="email" name="email" class="form-control" placeholder="Endereço de E-Mail..." required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Fone/Whatsapp</label>
                                <input type="number" name="fone" class="form-control"  placeholder="(00)00000-0000..." required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Profissão</label>
                                <input type="text" name="profissao" class="form-control" placeholder="Profissão do Proprietário...">
                            </div>
                        </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Endereço da Propriedade:</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Cidade</label>
                            <input type="text" name="cidade" class="form-control" placeholder="Cidade..." required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Estado</label>
                            <select class="form-control" name="estado" required="">
                                <option selected>Selecione...</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>CEP</label>
                            <input type="text" name="cep" class="form-control" placeholder="Ex.: 00000-000" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Ex:. Rua Presidente Vargas" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Bairro</label>
                            <input type="text" name="bairro" class="form-control" placeholder="Ex:. Centro" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Número</label>
                            <input type="number" name="numero" class="form-control" placeholder="Ex:. 513" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Complemento</label>
                            <input type="text" name="complemento" class="form-control" placeholder="Ex:. Apto 83" required="">
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
                            <select class="form-control" name="situacao" required="">
                                <option selected>Selecione...</option>
                                <option value="Desocupado">Desocupado</option>
                                <option value="Locado">Locado</option>
                                <option value="Mobiliado">Mobiliado</option>
                                <option value="Semimobiliado">Semimobiliado</option>
                                <option value="Não Mobiliado">Não Mobiliado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo</label>
                            <select class="form-control" name="tipo" required="">
                                <option selected>Selecione...</option>
                                <option value="Casa térrea">Casa térrea</option>
                                <option value="Casa em condomínio fechado">Casa em cóndominio fechado</option>
                                <option value="Sobrado">Sobrado</option>
                                <option value="Sobrado em condomínio fechado">Sobrado em condomínio fechado</option>
                                <option value="Apartamento">Apartamento</option>
                                <option value="Cobertura">Cobertura</option>
                                <option value="Kitnet">Kitnet</option>
                                <option value="Terreno">Terreno</option>
                                <option value="Terreno em condomínio fechado">Terreno em condomínio fechado</option>
                                <option value="Salão">Salão</option>
                                <option value="Sala Comercial">Sala Comercial</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Disponibilidade</label>
                            <select class="form-control" name="disponibilidade" required="">
                                <option selected>Selecione...</option>
                                <option value="Venda">Venda</option>
                                <option value="Locação">Locação</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Financiável</label>
                            <select class="form-control" name="financiavel" required="">
                                <option selected>Selecione...</option>
                                <option value="Não">Não</option>
                                <option value="sim">Sim</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Valor do Imóvel</label>
                            <input type="number" name="valor_imovel" class="form-control" placeholder="Ex:. 500.000" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>IPTU Anual</label>
                            <input type="number" name="iptu" class="form-control" placeholder="Ex:. 500,00" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Valor do Condomínio</label>
                            <input type="number" name="valor_comdominio" class="form-control" placeholder="Ex:. 250,00" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Terreno(m²)</label>
                            <input type="text" name="terreno" class="form-control" placeholder="Ex:. 35 ou N/A" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Área Construida(m²)</label>
                            <input type="number" name="area_construida" class="form-control" placeholder="Ex:. 25" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Quartos</label>
                            <input type="number" name="quartos" class="form-control" placeholder="Ex:. 3" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Banheiros</label>
                            <input type="number" name="banheiros" class="form-control" placeholder="Ex:. 4" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Suítes</label>
                            <input type="number" name="suites" class="form-control" placeholder="Ex:. 2" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Salas</label>
                            <input type="number" name="salas" class="form-control" placeholder="Ex:. 1" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Cozinhas</label>
                            <input type="number" name="cozinhas" class="form-control" placeholder="Ex:. 1" required="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Garagens (Qts Carros)</label>
                            <input type="number" name="garagem" class="form-control" placeholder="Ex:. 4" required="">
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
                            <input type="text" class="form-control" name="titulo" placeholder="Ex:. Residencial Daltroville" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sub-Título do Anúncio</label>
                            <input type="text" class="form-control" name="subtitulo" placeholder="Ex:. Residencia nova próxima ao Centro" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Descrição</label>
                            <textarea class="form-control" name="descricao" placeholder="Ex:. Insira uma descrição para ser exibida na página do imóvel..." required=""></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Comodidades/Observações</label>
                            <textarea class="form-control" name="observacao" placeholder="Ex:. Insira Comodidades/Observações para ser exibida na página do imóvel..." required=""></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Imagem de Capa</label>
                            <input type="file" class="form-control" name="capa" accept="image/png, image/jpeg, image/jpg" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Imagens da Propriedade</label>
                            <input type="file" class="form-control" name="imagens[]" multiple="multiple" accept="image/png, image/jpeg, image/jpg" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Imagem Para Página Home</label>
                            <input type="file" class="form-control" name="imagem_home" accept="image/png, image/jpeg, image/jpg" required="">
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
                                <span class="text">Adicionar Propriedade</span>
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