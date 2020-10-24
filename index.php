<?php
$pageTitle = 'Aderência de GRE';
include('./View/inc/header.php');
?>

<div class='container-fluid content theme-background p-5'>
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
                        <button type="submit" class="btn btn-primary"">Entrar</button>
                        <button type=" button" class="btn btn-secondary" onclick="cadastrar()">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$jsFile = 'index';
include('./View/inc/footer.php');
?>