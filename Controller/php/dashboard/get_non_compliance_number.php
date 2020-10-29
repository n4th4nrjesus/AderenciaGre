<?php
include(__DIR__ . '/../../../Database/database_connection.php');

$userId = trim($_POST["userId"]);

$totalItemsQuery = executeSelect("
    SELECT
        COUNT(*) AS num_total
    FROM usuario_pergunta
    WHERE usuario_id = '{$userId}'
        AND atendida = 0;
");

$response = 'N/A';

if ($totalItemsQuery["status"] == 1) {
    $totalItems = mysqli_fetch_assoc($totalItemsQuery["result"])["num_total"];

    if ($totalItems)
        $response = $totalItems;
}

echo json_encode($response);
