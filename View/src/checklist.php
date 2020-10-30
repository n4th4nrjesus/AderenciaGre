<?php
include(__DIR__ . '/../../Controller/php/is_logged.php');

$tab = $_GET['tab'];

$checklist_tab = 'casos de uso';
if ($tab == 'especificacoes_requisitos')
    $checklist_tab = 'especificações de requisitos';

$pageTitle = 'Aderência de GRE - checklist - ' . $checklist_tab;
include(__DIR__ . '/../inc/header.php');
?>

<div class="container-fluid pt-4">
    <input type="hidden" id="user-id" value="<?= $_SESSION["usuario_id"]; ?>">
    <input type="hidden" id="tab-name" value="<?= $tab; ?>">
    <div class="row pr-4 pl-4">
        <div class="col-12 bg-light p-4 rounded-lg table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">Pergunta</th>
                        <th scope="col">Atendida</th>
                        <th scope="col">Urgência</th>
                        <th scope="col">Complexidade</th>
                        <th scope="col">Prazo</th>
                        <th scope="col">Plano de ação</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Escalonada</th>
                    </tr>
                </thead>
                <tbody id="question-list">
                    <tr>
                        <?php for ($i = 0; $i < 8; $i++) { ?>
                            <td class="pt-5 bg-light text-center">
                                <svg width="2rem" height="2rem" viewBox="0 0 16 16" class="bi bi-hourglass-split" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13s-.866-1.299-3-1.48V8.35z" />
                                </svg>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$jsFile = 'checklist';
include(__DIR__ . '/../inc/footer.php');
?>