<?php
include(__DIR__ . '/../../../../Database/database_connection.php');

$userId = trim($_POST["userId"]);
$artifactId = trim($_POST["artifactId"]);

$totalItemsQuery = executeSelect("
    SELECT
        COUNT(up.*) AS num_total
    FROM usuario_pergunta up
    INNER JOIN pergunta_checklist pc
        ON up.pergunta_id = pc.id
    WHERE uo.usuario_id = '{$userId}'
        AND pc.artefato_id = {$artifactId};
");

$numberOfAdherencesQuery = executeSelect("
    SELECT
        COUNT(up.*) AS num_adherences
    FROM usuario_pergunta up
    INNER JOIN pergunta_checklist pc
        ON up.pergunta_id = pc.id
    WHERE up.usuario_id = '{$userId}'
        AND up.atendida IN (1, 2)
        AND pc.artefato_id = {$artifactId};
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
