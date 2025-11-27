<?php

session_start();

$employee_id = $_SESSION['employee_id'] ?? null;

$equipament_name = $_POST['equipament_name'] ?? null;
$equipament_number = $_POST['equipament_number'] ?? null;
$description = $_POST['description'] ?? null;

if (!$employee_id) {
   $_SESSION['bad_request'] = "Houve um problema com a autenticação. Logue-se novamente.";
   header("Location: /klo.oor/pages/employee/open-call.php");
   exit;
}

if (!$equipament_name || !$equipament_number || !$description) {
   $_SESSION['bad_request'] = "Preencha todos os campos";
   header("Location: /klo.oor/pages/employee/open-call.php");
   exit;
}

$db = include "../db/connect.php";

$created_at = date('Y-m-d H:i:s');
$status = "OPEN";

$query = $db->prepare("INSERT INTO calls (employee_id, created_at, status, equipament_name, equipament_number, description) VALUES (?, ?, ?, ?, ?, ?)");
$query->bind_param("isssss", $employee_id, $created_at, $status, $equipament_name, $equipament_number, $description);
$query->execute();

header("Location: /klo.oor/pages/employee/calls.php");
exit;