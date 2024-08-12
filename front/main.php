<?php

$type = $_GET['type'] ?? 0;
$nav = '全部商品';
if ($type == 0) {
    $rows = $Goods->all(['sh' => 1]);
} else {
    $tmp = $Type->find($type);
    if ($tmp['big_id'] == 0) {
        //大分類
        $rows = $Goods->all(['sh' => 1, 'big' => $type]);
        $nav = $tmp['name'];
    } else {
        //中分類
        $rows = $Goods->all(['sh' => 1, 'mid' => $type]);
        $big = $Type->find($tmp['big_id']);
        $nav = $big['name'] . '>' . $tmp['name'];
    }
}


?>

<h2><?= $nav; ?></h2>