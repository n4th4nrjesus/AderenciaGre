<?php

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$usuario = new Usuario();
$usuario->email = $email;
$usuario->senha = $senha;

$query = <<<SQL
    SELECT
        id
    FROM aderencia_gre.usuario
    WHERE email = {$usuario->email}
        AND senha = {$usuario->senha};
SQL;

$response = [];
$result = null;

if ($result = findLogin($query)) {
    $response['status'] = 0;
    $response['msg'] = 'Login inválido! Tente novamente ou cadastre uma conta agora.';

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 1;
        $response['msg'] = 'Login válido!';
    }
} else {
    $response['status'] = 0;
    $response['msg'] = mysqli_error($conn);
}

setSessionData($response['status'], $result);
echo json_encode($response);

function findLogin($query)
{
    global $conn;
    return mysqli_query($conn, $query);
}

function setSessionData($response_status, $result)
{
    if ($response_status) {
        $row = mysqli_fetch_assoc($result)[0];

        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];
        $_SESSION['usuario_email'] = $row['email'];
    }
}
