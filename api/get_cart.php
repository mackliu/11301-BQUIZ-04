<?php include_once "base.php";

$cart = [];
$total = 0;
foreach ($_SESSION['cart'] as $id => $qt) {
    $goods = $Goods->find($id);
    $cart['list'][] = [
        'name' => $goods['name'],
        'qt' => $qt,
        'sum' => $goods['price'] * $qt
    ];
    $total = $total + $goods['price'] * $qt;
}

$cart['total'] = $total;

echo json_encode($cart);
