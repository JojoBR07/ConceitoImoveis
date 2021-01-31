<!DOCTYPE html>
<?php
/**
 * 
 * SESSION_START indica ao php que nesta pagina será utilizado funções
 * envolvendo sessão.
 * 
 */
session_start();
?>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Conceito Imóveis - Login</title>

        <!-- Custom fonts for this template-->
        <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 

        <!-- Custom styles for this template-->
        <link href="../libs/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-success">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">

                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">

                                    <div class="p-5">
                                        <div class="text-center"> 
                                            <h1 class="h2 text-gray-900 mb-4">Bem vindo ao Conceito Imoveis!</h1>
                                            <h3 class="h5 text-gray-600 mb-4">Gerenciador Automatizado de Propriedades</h3>
                                        </div>

                                        <form action="../validation/authenticate_login.php" class="user" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Insira o código de Matrícula..." required="required">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha" required="required">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">

                                                    <?php
                                                    /**
                                                     * 
                                                     * As seguintes linhas de codigo PHP servem para verificar se
                                                     * o usuário entrou na pagina pela 1º vez, se ele recarregou a página
                                                     * ou se a pagina que valida as credenciais de matricula e
                                                     * senha redirecionou o usuario para a pagina de login novamente
                                                     * 
                                                     * A utilidde de fazer esse teste é simplismente identificar quis 
                                                     * mensagens devemos mostrar ao usuario, Por Exemplo: se ele foi 
                                                     * direcionado por digitar a senha incorreta, o certo é mostrar um
                                                     * mensages de senha invalida, caso ele entrou na pagina de login pela
                                                     * 1º vez, o melhor é não apresentar mensagens nenhuma.
                                                     * 
                                                     */
                                                    if (isset($_SESSION['LOGIN_NAO_EFETUADO'])) {
                                                        if (isset($_GET['retorno'])) {
                                                            ?>
                                                            <div style="position: fixed; bottom: 10px; left:2%; width: 96%;">
                                                                <div class="alert alert-warning alert-dismissible">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    <strong> <?php echo $_GET['retorno'] . "!" ?></strong>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        unset($_SESSION['LOGIN_NAO_EFETUADO']);
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <script>
                window.setTimeout(function () {
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 4000);
            </script>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../libs/vendor/jquery/jquery.min.js"></script>
        <script src="../libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../libs/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../libs/js/sb-admin-2.min.js"></script>

    </body>

</html>
