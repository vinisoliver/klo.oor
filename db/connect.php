<?php
$harded_env = include dirname(__DIR__) . "/env/harded.php";

$host = $harded_env["DB_HOST"];
$user = $harded_env["DB_USER"];
$pass = $harded_env["DB_PASSWORD"];
$db   = $harded_env["DB_NAME"];

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

return $conn;
