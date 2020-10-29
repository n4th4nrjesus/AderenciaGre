<?php
include(__DIR__ . '/../../../../Database/database_connection.php');
include(__DIR__ . '/../../../../Model/usuario_pergunta.php');

$userId = trim($_POST["userId"]);

$usuario_pergunta = new UsuarioPergunta();

$totalUrgencyQuery = $usuario_pergunta->find(
    "up.usuario_id = {$userId}
        AND up.atendida = 0
        AND up.urgencia_id IS NOT NULL",
    "",
    "COUNT(up.pergunta_checklist_id) AS total_urgencias"
);

$sumUrgencyQuery = $usuario_pergunta->find(
    "up.usuario_id = {$userId}
        AND up.atendida = 0
    GROUP BY up.pergunta_checklist_id",
    "INNER JOIN urgencia u
        ON up.urgencia_id = u.id",
    "SUM(u.dias_prazo) AS soma_dias_prazo_urgencias"
);

$response = 'N/A';

if ($totalUrgencyQuery["status"] == 1 && $sumUrgencyQuery["status"] == 1) {
    $totalUrgency = mysqli_fetch_assoc($totalUrgencyQuery["result"])["total_urgencias"];
    $sumUrgency = mysqli_fetch_assoc($sumUrgencyQuery["result"])["soma_dias_prazo_urgencias"];

    if ($totalUrgency) {
        $mediumUrgency = $sumUrgency / $totalUrgency;

        $response = mediumUrgencyName($mediumUrgency);
    }
}

echo json_encode($response);

function mediumUrgencyName($mediumUrgency)
{
    if ($mediumUrgency < 0.5)
        return "Urgente";
    if ($mediumUrgency < 1.5)
        return "Alta";
    if ($mediumUrgency < 2.5)
        return "Média";
    return "Baixa";
}
