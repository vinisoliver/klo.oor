<html>
<head>
   <link rel="stylesheet" href="../../styles/global.css">
   <link rel="stylesheet" href="../../styles/gradient.css">
   <link rel="stylesheet" href="../../styles/modal.css">
   <link rel="icon" href="../../assets/logo.svg" type="image/png">
   <title>Klo.oor | Chamadas</title>
</head>
<body>
   <?php define("BASE_URL", "/klo.oor"); ?>

   <?php 
      session_start();
      include "../../auth/authorize.php";
      $employeeId = authorize("employee");
      
      include "../../api/get-employee.php";
      $employee = getEmployee($employeeId);

      include_once "../../api/get-calls.php";
   ?>

   <?php include_once "../../components/button.php"; ?>
   <?php include_once "../../components/logo.php"; ?>
   <?php include_once "../../components/user-card.php"; ?>
   <?php include_once "../../components/block.php"; ?>
   <?php include_once "../../components/link-button.php"; ?>
   <?php include_once "../../components/calls/list.php"; ?>
   
   <?php include_once "../../styles/icons.php"; ?>
   
   <?php include "../../utils/errors.php"; ?>
   
   <div style="width: 100%; max-width: 560px;">

      <div style="display: flex; flex-direction: column; height: 100%; margin-top: 48px; align-items: center; width: 100%; gap: 36px; padding: 24px;">
         <?= Logo() ?>

         <?= Block([
            "title" => "Informações da conta",
            "content" => UserCard([
               "role" => "employee",
               "user_name" => $employee->name,
               "user_department" => $employee->department
            ]),
         ]) ?>
   
         <?= LinkButton([
            "text" => "Abrir chamado",
            "icon" => Icon::$add,
            "href" => "open-call.php"
         ]) ?>
   
         <?= Block([
            "title" => "Minhas chamadas",
            "content" => CallList([
               "calls" => getCalls([
                  "employeeId" => $employeeId
               ]),
               "user_role" => "employee",
            ]),
         ]) ?>
      </div>

   </div>
</body>
</html>