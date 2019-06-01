<?php

//nome das tabelas: usuarios, servicos, usuario_servico

$server = 'localhost';
$user = 'root';
$pass = '591638';
$db = 'notePassPHP';

$connection = new mysqli($server, $user, $pass, $db);

if ($connection->connect_errno) {
	echo "Erro na conexão: (" . $connection->connect_errno . ")" . $connection->connect_error;
}
