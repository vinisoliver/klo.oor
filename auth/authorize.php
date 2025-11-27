<?php
function authorize($role) {
   if (isset($_SESSION['ultimo_acesso'])) {
      $tempo_inativo = time() - $_SESSION['ultimo_acesso'];
      if ($tempo_inativo > 60) {
         session_unset();
         session_destroy();
         header("Location: /klo.oor");
         exit;
      }
   }

   $_SESSION['ultimo_acesso'] = time();

   if (isset($_SESSION['auth_token'])) { 
      $token = $_SESSION['auth_token'];

      $harded_env = include dirname(__DIR__) . "/env/harded.php";
      
      $isAuthorizedByManager = $harded_env["MANAGER_AUTH_TOKEN"] === $token;
      $isAuthorizedByEmployee = $harded_env["EMPLOYEE_AUTH_TOKEN"] === $token;
      
      if ($role === "manager" && $isAuthorizedByManager) { return; }
      if ($role === "employee" && $isAuthorizedByEmployee) { return $_SESSION['employee_id']; }
   }

   header("Location: /klo.oor");
   exit;
}