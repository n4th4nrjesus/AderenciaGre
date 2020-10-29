<?php
session_start();
include(__DIR__ . '/../../../../../Database/database_connection.php');
include(__DIR__ . '/../../../../../Model/usuario_pergunta.php');



$usuario_pergunta = new UsuarioPergunta();

$where = 'up.usuario_id = u.id';
$join = 'INNER JOIN aderencia_gre.usuario u';
$fields = 'up.pergunta_checklist_id';

$pergunta = $usuario_pergunta->find($where, $join, $fields);
