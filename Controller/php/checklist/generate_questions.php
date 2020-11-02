<?php
include(__DIR__ . '/../../../Model/pergunta_checklist.php');

function generateQuestionsForUser(int $userId)
{
    $pergunta_checklist = new PerguntaChecklist();

    $questionsQuery = $pergunta_checklist->find("", "", "*");

    if ($questionsQuery['status'] == 1) {
        while ($question = mysqli_fetch_assoc($questionsQuery['result'])) {
            $usuario_pergunta = new UsuarioPergunta();

            $usuario_pergunta->usuario_id = $userId;
            $usuario_pergunta->pergunta_checklist_id = (int)$question["id"];
            $usuario_pergunta->atendida = 1;
            $usuario_pergunta->escalonada = 0;
            $usuario_pergunta->create();
        }
    }
}
