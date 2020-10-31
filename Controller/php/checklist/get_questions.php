<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/usuario_pergunta.php');
include(__DIR__ . '/../../../Controller/php/checklist/generate_questions.php');

$userId = $_POST["userId"];
$tabName = $_POST["tabName"];

$response = 'Algum erro ocorreu.';

$questionsQuery = findQuestions($userId, $tabName);
setResponse($userId, $questionsQuery, $tabName);

function setResponse($userId, $questionsQuery, $tabName)
{
    global $response;

    switch ($questionsQuery['status']) {
        case -1:
            $response = $questionsQuery['result'];
            break;
        case 0:
            generateQuestionsForUser($userId);
            $questionsQuery = findQuestions($userId, $tabName);
            fetchUserQuestions($questionsQuery['result']);
            break;
        case 1:
            fetchUserQuestions($questionsQuery['result']);
            break;
    }
}

function findQuestions($userId, $tabName)
{
    $tabId = 1;
    if ($tabName == "especificacoes_requisitos")
        $tabId = 2;

    $usuario_pergunta = new UsuarioPergunta();

    return $usuario_pergunta->find(
        "up.usuario_id = {$userId}
        AND pc.artefato_id = {$tabId}",
        "INNER JOIN pergunta_checklist pc
        ON up.pergunta_checklist_id = pc.id",
        "pc.id
    , pc.descricao
    , up.atendida
    , up.urgencia_id
    , up.complexidade_id
    , up.prazo
    , up.plano_acao
    , up.escalonada"
    );
}

function fetchUserQuestions($questionsQueryResult)
{
    global $response;
    $response = [];

    $i = 0;
    while ($question = mysqli_fetch_assoc($questionsQueryResult)) {
        $response[$i]["questionId"] = $question["id"];
        $response[$i]["questionDescription"] = $question["descricao"];
        $response[$i]["accord"] = $question["atendida"];
        $response[$i]["urgency"] = $question["urgencia_id"];
        $response[$i]["complexity"] = $question["complexidade_id"];
        $response[$i]["deadline"] = $question["prazo"];
        $response[$i]["action-plan"] = $question["plano_acao"];
        $response[$i]["echeloned"] = $question["escalonada"];

        $i++;
    }
}

echo json_encode($response);
