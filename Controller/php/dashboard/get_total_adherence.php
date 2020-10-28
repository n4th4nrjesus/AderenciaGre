<?php
include(__DIR__ . '/../../../Database/database_connection.php');

$userId = trim($_POST["userId"]);

$totalItemsQuery = executeSelect("
    SELECT
        COUNT(*) AS num_total
    FROM usuario_pergunta
    WHERE usuario_id = '{$userId}';
");

$numberOfAdherencesQuery = executeSelect("
    SELECT
        COUNT(*) AS num_adherences
    FROM usuario_pergunta
    WHERE usuario_id = '{$userId}'
        AND atendida IN (1, 2);
");

$response = 'N/A';

if ($totalItemsQuery["status"] == 1 && $numberOfAdherencesQuery["status"] == 1) {
    $totalItems = mysqli_fetch_assoc($totalItemsQuery["result"])["num_total"];
    $numberOfAdherences = mysqli_fetch_assoc($numberOfAdherencesQuery["result"])["num_adherences"];

    if ($totalItems) {
        $totalAdherence = $numberOfAdherences * 100 / $totalItems;
        $response = $totalAdherence;
    }
}

echo json_encode($response);
