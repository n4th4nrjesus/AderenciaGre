<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] ?>/AderenciaGre/View/css/index.css">
</head>
<?php
if (isset($doDBConn) && $doDBConn == 1)
    require("http://" . $_SERVER['SERVER_NAME'] . '/AderenciaGre/Database/database_connection.php');
?>

<body>