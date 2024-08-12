<?php

$type = $_GET['type'] ?? 0;

if ($type == 0) {
    $rows = $Goods->all(['sh' => 1]);
} else {
    $tmp = $Type->find($type);
    if ($tmp['big_id'] == 0) {
        //大分類
        $rows = $Goods->all(['sh' => 1, 'big' => $type]);
    } else {
        //中分類
        $rows = $Goods->all(['sh' => 1, 'mid' => $type]);
    }
}


//dd($rows);
