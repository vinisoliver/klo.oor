<html>
<head>
   <link rel="stylesheet" href="../../styles/global.css">
   <link rel="icon" href="../../assets/logo.svg" type="image/png">
   <title>Klo.oor | Abrir chamado</title>
</head>
<body>
   <?php define("BASE_URL", "/klo.oor"); ?>

   <?php 
      session_start();
      include "../../auth/authorize.php";
      $employeeId = authorize("employee");
   ?>

   <?php include_once "../../components/button.php"; ?>
   <?php include_once "../../components/logo.php"; ?>
   <?php include_once "../../components/input.php"; ?>
   <?php include_once "../../components/red-message.php"; ?>
   
   <?php include "../../utils/errors.php"; ?>
   
   <div style="width: 100%; max-width: 560px;">

      <div style="display: flex; flex-direction: column; height: 100%; margin-top: 48px; align-items: center; width: 100%; gap: 36px; padding: 24px;">
         <?= Logo() ?>
         
         <form 
            method="POST"
            action="<?= BASE_URL ?>/api/open-call.php"
            style="width: 100%; display: flex; flex-direction: column; gap: 24px"
         >
            <div style="width: 100%; display: flex; flex-direction: column; gap: 20px">
               <?= Input([
                  "label" => "Nome do equipamento",
                  "placeholder" => "Notebook",
                  "name" => "equipament_name"
               ]) ?>

               <?= Input([
                  "label" => "Número do equipamento",
                  "placeholder" => "1234",
                  "name" => "equipament_number"
               ]) ?>

               <?= Input([
                  "label" => "Descrição do problema",
                  "placeholder" => "Lentidão...",
                  "name" => "description"
               ]) ?>
            </div>

            <?php 
               throwBadRequestMessage();
            ?>

            <div style='display: flex; flex-direction: column; gap: 8px; width: 100%;'>
               <?= Button([
                  "text" => "Abrir",
                  "type" => "primary",
               ]) ?>
               <?= Button([
                  "text" => "Cancelar",
                  "type" => "secondary",
                  "on-click" => "window.location.href=this.dataset.href",
                  "properties" => "data-href='calls.php' type='button'",
               ]) ?>
            </div>
         </form>
      </div>

   </div>
</body>
</html>