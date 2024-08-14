<?php include_once "../api/base.php"; ?>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows = $Goods->all();
    foreach ($rows as $row) {
    ?>
        <tr class="pp ct">
            <td><?= $row['no']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['stock']; ?></td>
            <td id="g<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? "販售中" : "已下架"; ?></td>
            <td>
                <button onclick="location.href='?do=edit_goods&id=<?= $row['id']; ?>'">修改</button>
                <button onclick="del('Goods',<?= $row['id']; ?>,'goodslist')">刪除</button>
                <button onclick="sw('up',<?= $row['id']; ?>)">上架</button>
                <button onclick="sw('down',<?= $row['id']; ?>)">下架</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>