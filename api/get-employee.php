<?php
function getEmployee($employee_id) {
   if (!$employee_id) { 
      return throw new Exception("getEmployee: Missing employee id");
   }

   $db = include "../../db/connect.php";

   $sql = "
      SELECT 
         name,
         department,
         email,
         phone
      FROM employees
      WHERE id = ?
   ";
   $stmt = $db->prepare($sql);
   $stmt->bind_param("i", $employee_id);
   $stmt->execute();

   $result = $stmt->get_result();
   $employee = $result->fetch_assoc();

   return $employee ? (object) $employee : null;
}