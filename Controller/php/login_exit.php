<?php
try {
    session_start();
    session_unset();
    session_destroy();

    $response['status'] = 1;
} catch (\Throwable $th) {
    $response['status'] = 0;
    $response['msg'] = $th->getMessage();
} finally {
    echo json_encode($response);
}
