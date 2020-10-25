<?php

include('../../../Database/database_connection.php');
include('../../../Model/usuario.php');

$usuario = new Usuario();
$usuario->email = trim($_POST['email']);
$usuario->senha = md5(trim($_POST['senha']));

$usuario_login = $usuario->find(
    "email = '{$usuario->email}' AND senha = '{$usuario->senha}'",
    '',
    ['id', 'nome', 'email']
);

$response['status'] = 0;
$response['msg'] = 'Login inválido! Tente novamente ou cadastre uma conta agora.';

switch ($usuario_login['status']) {
    case -1:
        $response['msg'] = $usuario_login['result'];
        break;
    case 1:
        $response["status"] = 1;
        break;
}

setSessionData($response['status'], $usuario_login['result']);
echo json_encode($response);

function setSessionData($response_status, $result)
{
    if ($response_status) {
        $row = mysqli_fetch_assoc($result);

        session_start();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];
        $_SESSION['usuario_email'] = $row['email'];
    }
}
