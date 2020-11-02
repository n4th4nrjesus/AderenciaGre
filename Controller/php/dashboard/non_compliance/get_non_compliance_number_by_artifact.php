<?php
include(__DIR__ . '/../../../../Database/database_connection.php');
include(__DIR__ . '/../../../../Model/usuario_pergunta.php');

$userId = trim($_POST["userId"]);
$artifactId = trim($_POST["artifactId"]);

$usuario_pergunta = new UsuarioPergunta();

$totalItemsQuery = $usuario_pergunta->find(
    "up.usuario_id = {$userId}
        AND pc.artefato_id = {$artifactId}
        AND up.atendida = 0",
    "INNER JOIN pergunta_checklist pc
        ON up.pergunta_checklist_id = pc.id",
    "COUNT(up.pergunta_checklist_id) AS num_total"
);

$response = 'N/A';

if ($totalItemsQuery["status"] == 1) {
    $totalItems = mysqli_fetch_assoc($totalItemsQuery["result"])["num_total"];

    if (!empty($totalItems) || $totalItems == "0")
        $response = $totalItems;
}

echo json_encode($response);
