<?php

include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/usuario.php');

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = md5(trim($_POST['senha']));

$usuario = new Usuario();

$usuario_exists = $usuario->find(
    "email = '{$email}'",
    ''
);

$response['status'] = 0;
$response['msg'] = 'Email já existente! Tente novamente com um outro email sem uma conta no sistema.';

switch ($usuario_exists['status']) {
    case -1:
        $response['msg'] = $usuario_exists['result'];
        break;
    case 0:
        $response['status'] = 1;
        break;
}

if ($response['status']) {
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->senha = $senha;
    $usuario->create();
}

echo json_encode($response);
