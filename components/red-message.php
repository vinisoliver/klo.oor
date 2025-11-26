<?php
include_once dirname(__DIR__) . "/styles/colors.php";
include_once dirname(__DIR__) . "/styles/typograph.php";

function RedMessage($message) {
   return "
      <p style='
         color: " . Colors::$unavailable . ";
         " . GetTypograph("label") . "
      '>
         $message
      </p>
   ";
}