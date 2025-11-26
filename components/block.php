<?php
include_once dirname(__DIR__) . "/styles/colors.php";
include_once dirname(__DIR__) . "/styles/typograph.php";

function Block($props) {
   $title = $props["title"];
   $content = $props["content"];

   if (!$title) { return throw "Block: Missing title."; }

   if (is_callable($content)) {
        ob_start();
        $content();
        $content = ob_get_clean();
    }

   return "
      <div style='
         display: flex;
         flex-direction: column;
         gap: 12px;
         width: 100%;
      '>
         <h4 style='
            color: " . Colors::$foreground . ";  
            " . GetTypograph("subtitle") . "
         '>
            " . $title . "
         </h4>

         " . $content . "
      </div>
   ";
}
