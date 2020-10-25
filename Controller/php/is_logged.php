<?php
session_start();
if (!isset($_SESSION['usuario_id']))
    header("Location: " . "http://" . $_SERVER['SERVER_NAME'] . '/AderenciaGre');

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: " . "http://" . $_SERVER['SERVER_NAME'] . '/AderenciaGre');
}
$_SESSION['LAST_ACTIVITY'] = time();
