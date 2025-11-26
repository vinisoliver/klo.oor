<?php
include_once dirname(__DIR__) . "/styles/colors.php";
include_once dirname(__DIR__) . "/styles/typograph.php";

function Input($props) {
   $label = $props["label"] ?? "Input";
   $placeholder = $props["placeholder"] ?? "Placeholder";
   $name = $props["name"] ?? "input";
   
   return "
      <div style='
         display: flex;
         justify-content: center;
         flex-direction: column;
         gap: 6px;
         width: 100%;
      '>
         <label style='
            color: " . Colors::$foreground . ";
            " . GetTypograph("label") . "
         '>
            $label
         </label>
         <input placeholder='$placeholder' name='$name' id='$name' type='text' style='
            width: 100%;
            height: 36px;
            background: none;
            color: " . Colors::$foreground . ";
            padding: 16px 12px;
            border: 2px solid " . Colors::$secondary_background . ";
            border-radius: 8px;
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 12px;
            " . GetTypograph("paragraph") . "
         '>
      </div>
   ";

}