<html>
<head>
   <link rel="stylesheet" href="../styles/global.css">
   <title>Klo.oor | Entrar</title>
</head>
<body>
   <?php define("BASE_URL", "/klo.oor"); ?>

   <?php include "../components/button.php"; ?>
   <?php include "../components/logo.php"; ?>
   <?php include "../components/input.php"; ?>
   <?php include "../components/red-message.php"; ?>

   <?php include "../utils/errors.php"; ?>
   
   <div style="display: flex; flex-direction: column; height: 100%; justify-content: center; align-items: center; width: 320px; gap: 36px;">
      <?= Logo() ?>

      <form 
         method="POST" 
         action="<?= BASE_URL ?>/auth/login.php"
         style="width: 100%; display: flex; flex-direction: column; gap: 24px"
      >
         <div style="width: 100%; display: flex; flex-direction: column; gap: 20px">
            <?= Input([
               "label" => "E-mail",
               "placeholder" => "Digite seu e-mail",
               "name" => "email"
            ]) ?>

            <?= Input([
               "label" => "Senha",
               "placeholder" => "Digite sua senha",
               "name" => "password"
            ]) ?>
         </div>

         <?php 
            throwBadRequestMessage();
         ?>

         <?= Button([
            "text" => "Entrar",
            "type" => "primary",
         ]) ?>
      </form>
   </div>
</body>
</html>