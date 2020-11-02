<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/usuario_pergunta.php');

$userId = trim($_POST["userId"]);

$usuario_pergunta = new UsuarioPergunta();

$totalItemsQuery = $usuario_pergunta->find(
    "up.usuario_id = {$userId}
    GROUP BY up.cargo_responsavel_id
    ORDER BY num_total DESC
    LIMIT 1",
    "INNER JOIN cargo_responsavel cr
        ON cr.id = up.cargo_responsavel_id",
    "cr.nome, COUNT(up.cargo_responsavel_id) AS num_total"
);

$response = 'N/A';

if ($totalItemsQuery["status"] == 1) {
    $totalItems = mysqli_fetch_assoc($totalItemsQuery["result"])["nome"];

    if (!empty($totalItems) || $totalItems == "0")
        $response = $totalItems;
}

echo json_encode($response);
