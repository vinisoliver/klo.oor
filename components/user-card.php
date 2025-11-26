<?php
include_once dirname(__DIR__) . "/styles/icons.php";
include_once dirname(__DIR__) . "/styles/colors.php";
include_once dirname(__DIR__) . "/styles/typograph.php";

# Needs to include styles: global.css and gradient.css

function UserCard($props) {
   $role = match($props["role"]) {
      "manager" => "Gerente",
      "employee" => "Funcionário"
   };
   
   if (!$role) { return throw "UserCard: Missing role"; }

   $user_name = $props["user_name"];
   $user_department = $props["user_department"];

   if (!$role) { return throw "UserCard: Missing user data"; }

   return "
      <div class='orange-gradient' style='
         width: 100%;
         border-radius: 8px;
         padding: 16px 12px;
         display: flex;
         align-items: center;
         gap: 12px;
      '>
         <div style='
            border-radius: 8px;
            padding: 10px;
            background: " . Colors::$secondary_foreground . ";
            color: " . Colors::$primary . ";
         '>
            " . Icon::$user . "
         </div>

         <div style='
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
            color: " . Colors::$foreground . "; 
         '>
            <p style='" . GetTypograph("paragraph") . "'>
               " . strtoupper($user_name) . "
            </p>
            <p style='" . GetTypograph("minimal") . "'>
               " . $role . " - " . ucwords($user_department) . "
            </p>
         </div>
      </div>
   ";
}