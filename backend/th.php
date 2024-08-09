<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類 <input type="text" name="big" id="big"><button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="bigSelect" id="bigSelect"></select>
    <input type="text" name="mid" id="mid"><button onclick="addType('mid')">新增</button>
</div>

<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr class="tt">
            <td><?= $big['name']; ?></td>
            <td class='ct'>
                <button onclick="editType(<?= $big['id']; ?>,this)">修改</button>
                <button onclick="del('Type',<?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        if ($Type->count(['big_id' => $big['id']]) > 0) {
            $mids = $Type->all(['big_id' => $big['id']]);
            foreach ($mids as $mid) {
        ?>
                <tr class="pp ct">
                    <td><?= $mid['name']; ?></td>
                    <td>
                        <button onclick="editType(<?= $mid['id']; ?>,this)">修改</button>
                        <button onclick="del('Type',<?= $mid['id']; ?>)">刪除</button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    <?php
    }
    ?>

</table>


<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>




<script>
    getTypes();
</script>