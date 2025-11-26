<?php
function authorize($role) {
   session_start();
   
   if (isset($_SESSION['auth_token'])) { 
      $token = $_SESSION['auth_token'];
      unset($_SESSION['auth_token']);

      $harded_env = include dirname(__DIR__) . "/env/harded.php";
      
      $isAuthorizedByManager = $harded_env["MANAGER_AUTH_TOKEN"] === $token;
      $isAuthorizedByEmployee = $harded_env["EMPLOYEE_AUTH_TOKEN"] === $token;
      
      if ($role === "manager" && $isAuthorizedByManager) { return; }
      if ($role === "employee" && $isAuthorizedByEmployee) { return; }
   }

   header("Location: /klo.oor");
   exit;
}