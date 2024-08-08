<?php include_once "base.php";

$table = $_GET['table'];
unset($_GET['table']);

echo $$table->count($_GET);
