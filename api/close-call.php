<?php
header('Content-Type: application/json');

include "../db/connect.php";

$call_id = $_POST['call_id'] ?? null;

if (!$call_id) {
    echo json_encode(["success" => false, "message" => "ID do chamado não enviado"]);
    exit;
}

// Atualiza status para CLOSED
$stmt = $conn->prepare("UPDATE calls SET status = 'CLOSED' WHERE id = ?");
$stmt->bind_param("i", $call_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao atualizar chamado"]);
}