<html>
<head>
   <link rel="stylesheet" href="../styles/global.css">
</head>
<body>
   <?php define("BASE_URL", "/klo.oor"); ?>

   <?php 
      include "../../auth/authorize.php";
      $token = authorize("manager");
      echo $token;
   ?>
</body>
</html>


