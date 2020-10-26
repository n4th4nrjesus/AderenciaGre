<?php
$pageTitle = 'Aderência de GRE - Cadastro';
$includeMenu = 0;
include(__DIR__ . '/../inc/header.php');
?>

<div class='container-fluid content p-5'>
    <div class="row box">
        <div class="col-12 bg-light p-4 rounded-lg">
            <div class="row">
                <div class="col-12 col-lg-7 responsive-separator-right">
                    <h1>Cadastre-se agora!</h1>
                    <p>
                        Esse é um sistema de gerenciamento para casos de uso e especificações de requisitos.
                        <br>Cadastre sua conta para acessar suas checklists, gerenciar suas dependências e organizar melhor seus prazos.
                    </p>
                </div>
                <div class="col-12 col-lg-5">
                    <form id="frmCadastro">
                        <div class="form-group">
                            <label for="txtNome">Nome</label>
                            <input type="text" class="form-control" id="txtNome" required pattern=".{5,250}" title="Nome de 5 a 250 caracteres">
                        </div>
                        <div class="form-group">
                            <label for="txtEmail">Email</label>
                            <input type="email" class="form-control" id="txtEmail" required pattern=".{0,250}" title="Email de até 250 caracteres">
                        </div>
                        <div class=" form-group">
                            <label for="txtSenha">Senha</label>
                            <input type="password" class="form-control" id="txtSenha" required pattern=".{0,40}" title="Senha de até 40 caracteres">
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 pt-2">
                                <input type="submit" class="btn btn-primary" value="Cadastrar">
                            </div>
                            <div class="col-12 col-lg-6 pt-2 text-right divBtnForm">
                                <a class="btn btn-secondary" href="../../">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-return-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                    Voltar à tela de login
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
$jsFile = 'cadastro';
include(__DIR__ . '/../inc/footer.php');
?>