<?php
# Esse é um exemplo de env que poderia ser adicionado. Nesse projeto, não será instalada nenhuma lib.

# Auth
$MANAGER_AUTH_TOKEN="f2FJ98JIejdief8J98FDio";
$EMPLOYEE_AUTH_TOKEN="gfg2gg25246529kwd";

# Admin setup
$MANAGER_EMAIL="admin@gmail.com";
$MANAGER_PASSWORD="1234";

# Database
$DB_HOST="localhost";
$DB_USER="root";
$DB_PASSWORD="";
$DB_NAME="klo_oor_db";

return [
   "MANAGER_EMAIL" => $MANAGER_EMAIL,
   "MANAGER_PASSWORD" => $MANAGER_PASSWORD,

   "MANAGER_AUTH_TOKEN" => $MANAGER_AUTH_TOKEN,
   "EMPLOYEE_AUTH_TOKEN" => $EMPLOYEE_AUTH_TOKEN,

   "DB_HOST" => $DB_HOST,
   "DB_USER" => $DB_USER,
   "DB_PASSWORD" => $DB_PASSWORD,
   "DB_NAME" => $DB_NAME,
];