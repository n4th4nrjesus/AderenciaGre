<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/usuario_pergunta.php');

$userId = trim($_POST["userId"]);

$usuario_pergunta = new UsuarioPergunta();

$totalItemsQuery = $usuario_pergunta->find(
    "usuario_id = {$userId}
        AND atendida = 0",
    "",
    "COUNT(*) AS num_total"
);

$response = 'N/A';

if ($totalItemsQuery["status"] == 1) {
    $totalItems = mysqli_fetch_assoc($totalItemsQuery["result"])["num_total"];

    if (!empty($totalItems) || $totalItems == "0")
        $response = $totalItems;
}

echo json_encode($response);
