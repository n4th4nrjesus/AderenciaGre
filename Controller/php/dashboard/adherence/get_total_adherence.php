<?php
include(__DIR__ . '/../../../../Database/database_connection.php');
include(__DIR__ . '/../../../../Model/usuario_pergunta.php');

$userId = trim($_POST["userId"]);

$usuario_pergunta = new UsuarioPergunta();

$totalItemsQuery = $usuario_pergunta->find(
    "usuario_id = {$userId}",
    "",
    "COUNT(*) AS num_total"
);

$numberOfAdherencesQuery = $usuario_pergunta->find(
    "usuario_id = {$userId}
        AND atendida IN (1, 2)",
    "",
    "COUNT(*) AS num_adherences"
);

$response = 'N/A';

if ($totalItemsQuery["status"] == 1 && $numberOfAdherencesQuery["status"] == 1) {
    $totalItems = mysqli_fetch_assoc($totalItemsQuery["result"])["num_total"];
    $numberOfAdherences = mysqli_fetch_assoc($numberOfAdherencesQuery["result"])["num_adherences"];

    if (!empty($totalItems) || $totalItems === 0) {
        $totalAdherence = $numberOfAdherences * 100 / $totalItems;
        $response = number_format($totalAdherence, 1);
    }
}

echo json_encode($response);
