<html>
<head>
   <link rel="stylesheet" href="../../styles/global.css">
   <link rel="icon" href="../../assets/logo.svg" type="image/png">
   <title>Klo.oor | Cadastrar funcionário</title>
</head>
<body>
   <?php define("BASE_URL", "/klo.oor"); ?>

   <?php 
      session_start();
      include "../../auth/authorize.php";
      authorize("manager");
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
            action="<?= BASE_URL ?>/api/create-employee.php"
            style="width: 100%; display: flex; flex-direction: column; gap: 24px"
         >
            <div style="width: 100%; display: flex; flex-direction: column; gap: 20px">
               <?= Input([
                  "label" => "Nome",
                  "placeholder" => "João da Silva",
                  "name" => "name"
               ]) ?>

               <?= Input([
                  "label" => "E-mail",
                  "placeholder" => "joaodasilva@gmail.com",
                  "name" => "email"
               ]) ?>

               <?= Input([
                  "label" => "Telefone",
                  "placeholder" => "11 98765-4321",
                  "name" => "phone"
               ]) ?>

               <?= Input([
                  "label" => "Departamento",
                  "placeholder" => "Financeiro",
                  "name" => "department"
               ]) ?>

               <?= Input([
                  "label" => "Senha de acesso",
                  "placeholder" => "XXXXXXX",
                  "name" => "password"
               ]) ?>
            </div>

            <?php 
               throwBadRequestMessage();
            ?>

            <div style='display: flex; flex-direction: column; gap: 8px; width: 100%;'>
               <?= Button([
                  "text" => "Cadastrar",
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