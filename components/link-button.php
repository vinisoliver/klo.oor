<?php
include_once dirname(__DIR__) . "/styles/colors.php";
include_once dirname(__DIR__) . "/styles/typograph.php";

function LinkButton($props) {
   $text = $props["text"] ?? "Link";
   $icon = $props["icon"] ?? "";
   
   $href = $props["href"] ?? "";

   return "
      <a href='$href' style='
         width: 100%;
         height: 48px;
         background: none;
         color: " . Colors::$foreground . ";
         padding: 16px 12px;
         border: 2px solid " . Colors::$secondary_background . ";
         border-radius: 8px;
         cursor: pointer;
         display: flex;
         align-items: center;
         text-decoration: none;
         gap: 12px;
         " . GetTypograph("paragraph") . "
      '>
         $icon
         $text
      </a>
   ";

}