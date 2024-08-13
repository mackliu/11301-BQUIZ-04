<?php
include_once "base.php";

if (isset($_GET['id']) && isset($_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}

echo count($_SESSION['cart']);
