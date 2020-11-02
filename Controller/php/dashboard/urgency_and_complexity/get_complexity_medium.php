<?php
include(__DIR__ . '/../../../../Database/database_connection.php');
include(__DIR__ . '/../../../../Model/usuario_pergunta.php');

$userId = trim($_POST["userId"]);

$usuario_pergunta = new UsuarioPergunta();

$totalComplexityQuery = $usuario_pergunta->find(
    "up.usuario_id = {$userId}
        AND up.atendida = 0
        AND up.complexidade_id IS NOT NULL",
    "",
    "COUNT(up.pergunta_checklist_id) AS total_complexidades"
);

$sumComplexityQuery = $usuario_pergunta->find(
    "up.usuario_id = {$userId}
        AND up.atendida = 0",
    "INNER JOIN complexidade c
        ON up.complexidade_id = c.id",
    "SUM(c.dias_prazo) AS soma_dias_prazo_complexidades"
);

$response = 'N/A';

if ($totalComplexityQuery["status"] == 1 && $sumComplexityQuery["status"] == 1) {
    $totalComplexity = mysqli_fetch_assoc($totalComplexityQuery["result"])["total_complexidades"];
    $sumComplexity = mysqli_fetch_assoc($sumComplexityQuery["result"])["soma_dias_prazo_complexidades"];

    if ($totalComplexity) {
        $mediumComplexity = $sumComplexity / $totalComplexity;

        $response = mediumComplexityName($mediumComplexity);
    }
}

echo json_encode($response);

function mediumComplexityName($mediumComplexity)
{
    if ($mediumComplexity < 1.5)
        return "Baixa";
    if ($mediumComplexity < 2.5)
        return "Média";
    return "Alta";
}
