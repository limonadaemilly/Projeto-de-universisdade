<?php

$hostname = 'localhost';
$usuario = 'root';
$senha = '';
$bancodedados = 'cadastro';

$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
} 

$conexao->set_charset("utf8");

?>