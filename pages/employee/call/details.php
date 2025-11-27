a<html>
<head>
   <link rel="stylesheet" href="../../../styles/global.css">
   <link rel="stylesheet" href="../../../styles/gradient.css">
   <link rel="stylesheet" href="../../../styles/modal.css">
   <link rel="icon" href="../../../assets/logo.svg" type="image/png">
   <title>Klo.oor | Detalhes</title>
</head>
<body>
   <?php define("BASE_URL", "/klo.oor"); ?>

   <?php 
      session_start();
      include "../../../auth/authorize.php";
      authorize("employee");

      include_once "../../../api/get-call.php";
      $call_id = $_GET["callId"] ?? null;

      if (!$call_id) {
         header("Location: /klo.oor/pages/employee/calls.php");
         exit;
      }

      $call = getCall($call_id);
?>

   <?php include_once "../../../components/button.php"; ?>
   <?php include_once "../../../components/logo.php"; ?>
   <?php include_once "../../../components/user-card.php"; ?>
   <?php include_once "../../../components/block.php"; ?>
   <?php include_once "../../../components/link-button.php"; ?>
   <?php include_once "../../../components/calls/list.php"; ?>
   
   <?php include_once "../../../styles/icons.php"; ?>
   
   <?php include "../../../utils/errors.php"; ?>
   
   <div style="width: 100%; max-width: 560px;">

      <div style="display: flex; flex-direction: column; height: 100%; margin-top: 48px; align-items: center; width: 100%; gap: 36px; padding: 24px; font-family: Inter, sans-serif; color: #fafafa;">
         <?= Logo() ?>
         
         <?= Block([
            "title" => "Sobre o cliente",
            "content" => function() use ($call) { ?>
               <div style="display: flex; flex-direction: column; width: 100%; gap: 10px;">
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>Requerente</p>
                     <p><?= strtoupper($call->employee_name) ?></p>
                  </div>
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>Departamento</p>
                     <p><?= $call->employee_department ?></p>
                  </div>
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>E-mail</p>
                     <p><?= $call->employee_email ?></p>
                  </div>
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>Telefone</p>
                     <p><?= $call->employee_phone ?></p>
                  </div>
               </div>
            <?php } 
         ]) ?>

         <?= Block([
            "title" => "Sobre o chamado",
            "content" => function() use ($call) { ?>
               <div style="display: flex; flex-direction: column; width: 100%; gap: 10px;">
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>ID do chamado</p>
                     <p><?= $call->id ?></p>
                  </div>
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>Nome do equipamento</p>
                     <p><?= $call->equipament_name ?></p>
                  </div>
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>Número do equipamento</p>
                     <p><?= $call->equipament_number ? $call->equipament_number : "---" ?></p>
                  </div>
                  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px; font-weight: 400;">
                     <p>Status</p>

                     <?= 
                        $call->status === "OPEN" ? 
                        "<p style='color: #2DD4BF; font-weight: 600'>ABERTO</p>" : 
                        "<p style='color: #EF4444; font-weight: 600'>ENCERRADO</p>" 
                     ?>
                  </div>
               </div>
            <?php } 
         ]) ?>

         <?= Block([
            "title" => "Descrição do problema",
            "content" => function() use ($call) { ?>
               <p style="font-size: 14px; font-weight: 400;">
                  <?= $call->description ?>
               </p>
            <?php } 
         ]) ?>
      </div>

   </div>
</body>
</html>