<?php
session_start();
if (!isset($_SESSION['usuario_id']))
    header("Location: " . $_SERVER['SCRIPT_URI'] . "/AderenciaGre");

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['SCRIPT_URI'] . "/AderenciaGre");
}
$_SESSION['LAST_ACTIVITY'] = time();
