<?php
include_once dirname(__DIR__) . "/../styles/colors.php";
include_once dirname(__DIR__) . "/../styles/icons.php";

function CallCard($props) {   
   $equipament_name = $props["equipament_name"];
   $call_id = $props["call_id"];
   $employee_name = $props["employee_name"];
   $employee_department = $props["employee_department"];
   $created_at = $props["created_at"];


   $status_text = match($props["status"]) {
      "CLOSED" => "ENCERRADA",
      "OPEN" => "ABERTA",
   };
   $status_color = match($props["status"]) {
      "CLOSED" => Colors::$unavailable,
      "OPEN" => Colors::$available
   };

   $call_details_href = "calls/details?callId=" . $call_id;

   return "
      <div style='
         display: flex;
         flex-direction: column;
         gap: 12px;
         width: 100%;
         border: 2px solid " . Colors::$secondary_background . ";
         border-radius: 8px;
         padding: 12px;
         color: " . Colors::$foreground . ";
      '>
         <div style='
            display: flex;
            justify-content: space-between;
            align-items: center;
         '>
            <h5 style='" . GetTypograph("name") . "'>
               Chamada #" . $call_id . "
            </h5>
            " . Button([
               "icon" => Icon::$eye,
               "type" => "normal-icon",
               "on-click" => "window.location.href=this.dataset.href",
               "properties" => "data-href='" . $call_details_href . "'"
            ]) . "
         </div>

         <div style='
            display: flex;
            flex-direction: column;
            " . GetTypograph("paragraph") . "
         '>
            <p>Equipamento: " . $equipament_name . "</p>
            <p>Requerente: " . strtoupper($employee_name) . "</p>
            <p>Departamento: " . $employee_department . "</p>
            <p>Data: " . $created_at . "</p>
         </div>
         
         <p style='
            color: " . $status_color . ";
            " . GetTypograph("name") . "
         '>
            CHAMADA " . $status_text . "
         </p>
      </div>
   ";
}