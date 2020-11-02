<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/cargo_responsavel.php');

$userId = trim($_POST["userId"]);

$cargo_responsavel = new CargoResponsavel();

$postsQuery = $cargo_responsavel->find(
    "cr.usuario_id = {$userId}
    GROUP BY cr.id
    ORDER BY num_responsabilidades DESC",
    "LEFT JOIN usuario_pergunta up
        ON cr.id = up.cargo_responsavel_id",
    "cr.nome, COUNT(up.pergunta_checklist_id) AS num_responsabilidades"
);

$response = 'Algum erro ocorreu.';

switch ($postsQuery["status"]) {
    case 0:
        $response = "Nenhum cargo cadastrado.";
        break;
    case 1:
        fetchPosts($postsQuery["result"]);
        break;
}

function fetchPosts($postsQuery)
{
    global $response;
    $response = [];

    $i = 0;
    while ($post = mysqli_fetch_assoc($postsQuery)) {
        $response[$i]["postName"] = $post["nome"];
        $response[$i]["totalResponsabilities"] = $post["num_responsabilidades"];

        $i++;
    }
}

echo json_encode($response);
