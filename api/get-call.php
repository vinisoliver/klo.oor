<?php
function getCall($call_id) {
   if (!$call_id) { 
      return throw new Exception("getEmployee: Missing call id");
   }
   
    $db = include "../../../db/connect.php";

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
        WHERE calls.id = ?
    ";

   $stmt = $db->prepare($sql);
   $stmt->bind_param("i", $call_id);
   $stmt->execute();
   
   $result = $stmt->get_result();
   $call = $result->fetch_assoc();

   return $call ? (object) $call : null;
}