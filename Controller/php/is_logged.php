<?php
session_start();
if (!isset($_SESSION['usuario_id']))
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AderenciaGre");

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AderenciaGre");
}
$_SESSION['LAST_ACTIVITY'] = time();
