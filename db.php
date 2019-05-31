<?php

//nome das tabelas: usuarios, servicos, usuario_servico

$server = 'localhost';
$user = 'root';
$pass = '591638';
$db = 'notePassPHP';

$connection = new mysqli($server, $user, $pass, $db);

if ($connection->connect_errno) {
	echo "Erro na coneão: (" . $connection->connect_errno . ")" . $connection->connect_error;
}

// try {
// 	$connection = new PDO("mysql:host=localhost;dbname=notePassPHP", "root", "591638");
// } catch (Exception $e) {
// 	echo "Erro de conexão com o bando: " . $e->getMessage();
// }