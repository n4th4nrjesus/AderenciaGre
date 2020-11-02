<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/cargo_responsavel.php');

$userId = trim($_POST["userId"]);
$nomeCargo = trim($_POST["nomeCargo"]);

$response = "Algum erro ocorreu durante o cadastro deste cargo.";

$cargo_responsavel = new CargoResponsavel();

$cargo_responsavel->nome = $nomeCargo;
$cargo_responsavel->usuario_id = $userId;
$createResult = $cargo_responsavel->create();

if ($createResult["status"] == 1) $response = "Cargo cadastrado com sucesso";

echo json_encode($response);
