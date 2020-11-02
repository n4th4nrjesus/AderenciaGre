<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/cargo_responsavel.php');

$userId = $_POST["userId"];

$cargo_responsavel = new CargoResponsavel();

$postsQuery = $cargo_responsavel->find(
    "usuario_id = {$userId}",
    "",
    "id, nome",
);

$response = 0;

if ($postsQuery["status"] == 1) {
    $response = [];

    $i = 0;
    while ($post = mysqli_fetch_assoc($postsQuery["result"])) {
        $response[$i]["postId"] = $post["id"];
        $response[$i]["postName"] = $post["nome"];

        $i++;
    }
}

echo json_encode($response);
