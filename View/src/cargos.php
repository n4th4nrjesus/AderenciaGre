<?php
include(__DIR__ . '/../../Controller/php/is_logged.php');

$pageTitle = 'Aderência de GRE - Responsáveis';
include(__DIR__ . '/../inc/header.php');
?>

<div class='container-fluid p-5'>
    <div class="row">
        <div class="col-12 bg-light p-4 rounded-lg mb-3 ">
            <form id="frmCadastro">
                <div class="form-group">
                    <label for="txtNome">Nome do cargo</label>
                    <input type="text" class="form-control" id="txtNome" required pattern=".{5,250}" title="Nome de 5 a 250 caracteres">
                </div>
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </form>
        </div>
        <div class="col-12 bg-light p-4 rounded-lg table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantidade de responsabilidades</th>
                    </tr>
                </thead>
                <tbody id="post-list">
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php

$jsFile = 'cargos';
include(__DIR__ . '/../inc/footer.php');
?>