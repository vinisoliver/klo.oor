<?php
session_start();

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (!$email || !$password) {
   $_SESSION['bad_request'] = "Preencha todos os campos.";
   header("Location: /klo.oor");
   exit;
}

$harded_env = include "../env/harded.php";

$manager_email = $harded_env["MANAGER_EMAIL"];
$manager_password = $harded_env["MANAGER_PASSWORD"];

$manager_auth_token = $harded_env["MANAGER_AUTH_TOKEN"];
$employee_auth_token = $harded_env["EMPLOYEE_AUTH_TOKEN"];

if ($email === $manager_email && $password === $manager_password) {
   $_SESSION['auth_token'] = $manager_auth_token;
   header("Location: /klo.oor/pages/manager/calls.php");
   exit;
}

$db = include "../db/connect.php";

$findEmployee = $db->prepare("SELECT email, password FROM employees WHERE email = ?");
$findEmployee->bind_param("s", $email);
$findEmployee->execute();

$result = $findEmployee->get_result();
$employee = $result->fetch_assoc();

if ($employee && $password === $employee["password"]) {
   $_SESSION['auth_token'] = $employee_auth_token;
   header("Location: /klo.oor/pages/employee/calls.php");
   exit;
}

$_SESSION['bad_request'] = "E-mail ou senha inválidos.";
header("Location: /klo.oor");