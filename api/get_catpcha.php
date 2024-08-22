<?php include_once "base.php";

$_SESSION['ans'] = code(5);


echo captcha($_SESSION['ans']);
