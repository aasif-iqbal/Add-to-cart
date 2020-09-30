<?php

defined("DB_LOCALHOST") ? null : define("DB_LOCALHOST", "localhost");
defined("DB_USERNAME") ? null : define("DB_USERNAME", "root");
defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
defined("DB_NAME") ? null : define("DB_NAME", "Add_to_cart_db");
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

$connection = mysqli_connect(DB_LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

require_once 'functions.php';

/*
if ($connection) {
echo "connected successfully!";
} else {
echo "connection failure...";
}
 */
?>