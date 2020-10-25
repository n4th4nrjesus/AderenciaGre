<?php
session_start();
if (isset($_SESSION['usuario_id']))
    header("Location: ./View/src/test.php");

$pageTitle = 'Aderência de GRE';
include(__DIR__ . '/View/inc/header.php');
?>

<div class='container-fluid content p-5'>
    <div class="row box">
        <div class="col-12 bg-light p-4 rounded-lg">
            <div class="row">
                <div class="col-12 col-lg-7 responsive-separator-right">
                    <h1>Bem vindo!</h1>
                    <p>
                        Esse é o seu sistema de gerenciamento para casos de uso e especificações de requisitos.
                        <br>Entre com a sua conta (ou cadastre uma nova, se não tiver) para acessar suas checklists.
                    </p>
                </div>
                <div class="col-12 col-lg-5">
                    <form id="frmLogin">
                        <div class="form-group">
                            <label for="txtEmail">Email</label>
                            <input type="email" class="form-control" id="txtEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="txtSenha">Senha</label>
                            <input type="password" class="form-control" id="txtSenha" required pattern=".{0,40}" title="Senha de até 40 caracteres">
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 pt-2">
                                <input type="submit" class="btn btn-primary" value="Entrar">
                            </div>
                            <div class="col-12 col-lg-6 pt-2 text-right divBtnForm">
                                <a class="btn btn-secondary" href="View/src/cadastro.php">Cadastrar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$jsFile = 'index';
$includeMenu = 0;

include(__DIR__ . '/View/inc/footer.php');
?>