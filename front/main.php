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

<?php
foreach ($rows as $row) {
?>
    <!-- .item>.img+.info>div*4 -->
    <div class="item">
        <div class="img"><img src="./images/<?= $row['img']; ?>" alt=""></div>
        <div class="info">
            <div><?= $row['name']; ?></div>
            <div>
                價錢:<?= $row['price']; ?>
                <img src="./icon/0402.jpg" alt="">
            </div>
            <div>規格:<?= $row['spec']; ?></div>
            <div>簡介:<?= mb_substr($row['name'], 0, 30); ?>...</div>
        </div>
    </div>

<?php
}
?>