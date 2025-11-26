<?php

function Logo() {
   $logo_path = BASE_URL . "/assets/logo.svg";
   
   return "
      <img style='width: 160px' src='$logo_path'>
   ";
}