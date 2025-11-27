<?php

session_start();

$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$phone = $_POST['phone'] ?? null;
$department = $_POST['department'] ?? null;
$password = $_POST['password'] ?? null;

if (!$name || !$email || !$phone || !$department || !$password) {
   $_SESSION['bad_request'] = "Preencha todos os campos.";
   header("Location: /klo.oor/pages/manager/create-employee.php");
   exit;
}

$db = include "../db/connect.php";

$findEmployee = $db->prepare("SELECT id FROM employees WHERE email = ?");
$findEmployee->bind_param("s", $email);
$findEmployee->execute();

$result = $findEmployee->get_result();
$employee = $result->fetch_assoc();

if ($employee) {
   $_SESSION['bad_request'] = "Já existe um usuário com este email.";
   header("Location: /klo.oor/pages/manager/create-employee.php");
   exit;
}

$findEmployee = $db->prepare("INSERT INTO employees (name, email, phone, department, password) VALUES (?, ?, ?, ?, ?)");
$findEmployee->bind_param("sssss", strtoupper($name), $email, $phone, $department, $password);
$findEmployee->execute();

header("Location: /klo.oor/pages/manager/calls.php");
exit;