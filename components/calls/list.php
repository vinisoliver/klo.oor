<?php
include_once dirname(__DIR__) . "/../styles/typograph.php";
include_once dirname(__DIR__) . "/../styles/colors.php";

include_once dirname(__DIR__) . "/calls/card.php";

function CallList($props) {
   $calls = $props["calls"] ?? [];

   $call_cards = "";

   foreach ($calls as $call) {
      $created_at = new DateTime($call->created_at);
      $formatted_created_at = $created_at->format("d/m/Y");

      $call_cards .= CallCard([
         "call_id" => $call->id,
         "created_at" => $formatted_created_at,
         "status" => $call->status,
         "equipament_name" => $call->equipament_name,
         "employee_name" => $call->employee_name,
         "employee_department" => $call->employee_department,
      ]);
   }

   if (count($calls) < 1) {
      return "
         <p style='
            color: " . Colors::$foreground . ";
            width: 100%;
            text-align: center;
            " . GetTypograph("paragraph") . "
         '>
            Nenhuma chamada encontrada.
         </p>
      ";
   }

   return "
      <div style='
         display: flex;
         flex-direction: column;
         gap: 8px;
         width: 100%;
      '>
         " . $call_cards . "
      </div>
   ";
}