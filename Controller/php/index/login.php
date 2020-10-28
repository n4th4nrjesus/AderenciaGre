<?php
include(__DIR__ . '/../../../Database/database_connection.php');
include(__DIR__ . '/../../../Model/usuario.php');

$email = trim($_POST['email']);
$senha = md5(trim($_POST['senha']));

$usuario = new Usuario();

$usuario_login = $usuario->find(
    "email = '{$email}' AND senha = '{$senha}'",
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
        $response['status'] = 1;
        break;
}

if ($response['status'])
    setSessionData($usuario_login['result']);

echo json_encode($response);

function setSessionData($result)
{
    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['usuario_nome'] = $row['nome'];
    $_SESSION['usuario_email'] = $row['email'];
}
