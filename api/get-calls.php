<?php
function getCalls($params = [
    "employeeId" => "",
    "status" => ""
]) {
    $employeeId = $params["employeeId"] ?? null;
    $status = $params["status"] ?? null;
    $db = include "../../db/connect.php";
    $calls = [];

    $sql = "
        SELECT 
            calls.id AS id,
            calls.created_at AS created_at,
            calls.status AS status,
            calls.equipament_name AS equipament_name,
            calls.equipament_number AS equipament_number,
            calls.description AS description,
            employees.name AS employee_name,
            employees.department AS employee_department,
            employees.email AS employee_email,
            employees.phone AS employee_phone
        FROM calls
        LEFT JOIN employees ON calls.employee_id = employees.id
    ";

    if ($employeeId) {
        $sql .= " WHERE calls.employee_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $employeeId);
    } else if ($status) {
        $sql .= " WHERE calls.status = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $status);
    } else {
        $stmt = $db->prepare($sql);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    while ($call = $result->fetch_assoc()) {
        $calls[] = (object) $call;
    }

    return $calls;
}