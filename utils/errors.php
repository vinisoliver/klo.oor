<?php

function throwBadRequestMessage() {
   if (isset($_SESSION['bad_request'])) {
      echo RedMessage($_SESSION['bad_request']);
      unset($_SESSION['bad_request']);
   }
}