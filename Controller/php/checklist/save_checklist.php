<?php
include(__DIR__ . '/../../../Database/database_connection.php');

$userId = $_POST["userId"];
$checklistData = $_POST["checklistData"];

$response = "Sucesso! Sua checklist foi salva com êxito.";

foreach ($checklistData as $row) {
    $actionPlan = "NULL";
    $urgency = "NULL";
    $complexity = "NULL";
    $responsible = "NULL";

    if (!empty($row["actionPlan"]))
        $actionPlan = "'" . $row["actionPlan"] . "'";

    if (!($row["urgency"] == "NaN"))
        $urgency = $row["urgency"];

    if (!($row["complexity"] == "NaN"))
        $complexity = $row["complexity"];

    if (!empty($row["responsible"]))
        $responsible = $row["responsible"];

    $updateSql = "
        UPDATE aderencia_gre.usuario_pergunta
            SET atendida = {$row["accord"]}
            , urgencia_id = {$urgency}
            , complexidade_id = {$complexity}
            , prazo = '{$row["deadline"]}'
            , plano_acao = {$actionPlan}
            , cargo_responsavel_id = {$responsible}
            , escalonada = {$row["echenoled"]}
        WHERE pergunta_checklist_id = {$row["id"]}
            AND usuario_id = {$userId}
    ";

    if (mysqli_query($conn, $updateSql))
        continue;

    $response = mysqli_error($conn);
    break;
}

echo json_encode($response);
