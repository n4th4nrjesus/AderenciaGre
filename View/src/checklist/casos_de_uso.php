<?php
include(__DIR__ . '/../../../Controller/php/is_logged.php');

$pageTitle = 'Aderência de GRE - checklist casos de uso';
$doDBConn = 1;
include(__DIR__ . '/../../inc/header.php');
?>

<div class="container">
    <div class="row box">
        <div class="col-12 bg-light p-4 rounded-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Artefato ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Complexidade</th>
                        <th>Urgência</th>
                    </tr>
                    <?php


                    ?>
                </thead>

        </div>
    </div>
</div>




<?php
$jsFile = 'checklist/casos_de_uso';
include(__DIR__ . '/../../inc/footer.php');
?>