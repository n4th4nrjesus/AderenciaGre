<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        <?php include(__DIR__ . '/../css/index.css') ?>
    </style>
</head>
<?php
if (isset($doDBConn) && $doDBConn == 1)
    include(__DIR__ . '/../../Database/database_connection.php');
?>

<body>