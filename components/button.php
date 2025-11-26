<?php
include_once dirname(__DIR__) . "/styles/colors.php";
include_once dirname(__DIR__) . "/styles/typograph.php";

function Button($props) {
   $text = $props["text"] ?? "Button";
   $type = $props["type"] ?? "primary";
   $icon = $props["icon"] ?? "";
   
   $class = $props["class"] ?? "";
   $on_click = $props["on-click"] ?? "";
   $properties = $props["properties"] ?? "";

   $is_primary = $type === "primary";
   $is_secondary = $type === "secondary";
   $is_destructive = $type === "destructive";
   $is_normal_icon = $type === "normal-icon";
   $is_destructive_icon = $type === "destructive-icon";

   if ($is_primary || $is_secondary || $is_destructive) {
      $background_color =  match($type) {
         "primary" => Colors::$primary,
         "secondary" => Colors::$secondary_background,
         "destructive" => Colors::$unavailable
      };

      return "
         <button " . $properties . " class='" . $class . "' onclick='" . $on_click . "' style='
            width: 100%;
            height: 36px;
            background: " . $background_color . ";
            color: " . Colors::$foreground . ";
            border: none;
            border-radius: 8px;
            cursor: pointer;
            " . GetTypograph("paragraph") . "
         '>
            $text
         </button>
      ";
   }

   if ($is_normal_icon || $is_destructive_icon) {
      $background_color =  match($type) {
         "normal-icon" => Colors::$secondary_background,
         "destructive-icon" => Colors::$unavailable
      };
      $icon_color = match($type) {
         "normal-icon" => Colors::$primary,
         "destructive-icon" => Colors::$foreground
      };

      return "
         <button " . $properties . " class='" . $class . "' onclick='" . $on_click . "' style='
            padding: 12px 12px;
            height: 36px;
            display: flex;
            align-items: center;
            background: " . $background_color . ";
            color: " . $icon_color . ";
            border: none;
            border-radius: 8px;
            cursor: pointer;
            " . GetTypograph("paragraph") . "
         '>
            $icon
         </button>
      ";
   }

}