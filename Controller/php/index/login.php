<?php

include('../../../Database/database_connection.php');
include('../../../Model/usuario.php');

$email = trim($_POST['email']);
$senha = md5(trim($_POST['senha']));

$usuario = new Usuario();
$usuario->email = $email;
$usuario->senha = $senha;

$query = "
    SELECT
        id
    FROM aderencia_gre.usuario
    WHERE email = '{$usuario->email}'
        AND senha = '{$usuario->senha}';
";

$response['status'] = 0;

if ($result = mysqli_query($conn, $query)) {
    $response['msg'] = 'Login inválido! Tente novamente ou cadastre uma conta agora.';

    if (mysqli_num_rows($result) > 0) {
        $response["status"] = 1;
        $response["msg"] = 'Login válido!';
    }
} else {
    $response['msg'] = mysqli_error($conn);
}

setSessionData($response['status'], $result);
echo json_encode($response);

function setSessionData($response_status, $result)
{
    if ($response_status) {
        $row = mysqli_fetch_assoc($result)[0];

        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];
        $_SESSION['usuario_email'] = $row['email'];
    }
}
