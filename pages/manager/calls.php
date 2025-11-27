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
      authorize("manager");

      include_once "../../api/get-calls.php";
   ?>

   <?php include_once "../../components/button.php"; ?>
   <?php include_once "../../components/logo.php"; ?>
   <?php include_once "../../components/input.php"; ?>
   <?php include_once "../../components/red-message.php"; ?>
   <?php include_once "../../components/user-card.php"; ?>
   <?php include_once "../../components/block.php"; ?>
   <?php include_once "../../components/link-button.php"; ?>
   <?php include_once "../../components/tabs.php"; ?>
   <?php include_once "../../components/calls/list.php"; ?>
   <?php include_once "../../components/calls/modal/close-call.php"; ?>
   
   <?php include_once "../../styles/icons.php"; ?>
   
   <?php include "../../utils/errors.php"; ?>
   
   <div style="width: 100%; max-width: 560px;">

      <div style="display: flex; flex-direction: column; height: 100%; margin-top: 48px; align-items: center; width: 100%; gap: 36px; padding: 24px;">
         <?= Logo() ?>
         <?= CloseCallModal() ?>

         <?= Block([
            "title" => "Informações da conta",
            "content" => UserCard([
               "role" => "manager",
               "user_name" => "administrador",
               "user_department" => "geral"
            ]),
         ]) ?>
   
         <?= LinkButton([
            "text" => "Cadastrar funcionário",
            "icon" => Icon::$add,
            "href" => "create-employee.php"
         ]) ?>
   
         <?= Block([
            "title" => "Chamados",
            "content" => Tabs([
               "sections" => [
                  ["name" => "Abertos", "content" => CallList([
                     "calls" => getCalls([
                        "status" => "OPEN"
                     ]),
                     "user_role" => "manager",
                  ]) ],
                  ["name" => "Encerrados", "content" => CallList([
                     "calls" => getCalls([
                        "status" => "CLOSED"
                     ]),
                     "user_role" => "manager",
                  ]) ],
               ],
            ]),
         ]) ?>
      </div>

   </div>
</body>
</html>