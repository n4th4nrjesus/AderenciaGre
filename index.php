<?php
session_start();
if (isset($_SESSION['usuario_id']))
    header("Location: ./View/src/dashboard.php");

$pageTitle = 'Aderência de GRE';
$includeMenu = 0;
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
                                <a class="btn btn-secondary" href="./View/src/cadastro.php">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                    Cadastrar
                                </a>
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
include(__DIR__ . '/View/inc/footer.php');
?>