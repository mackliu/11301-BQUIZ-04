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





<script>
    getTypes();

    function editType(id, dom) {
        let name = $(dom).parent().prev().text();
        let result = prompt("請輸入要修改的分類名稱", name);
        if (result != null) {
            $.post('api/edit_type.php', {
                id,
                name: result
            }, () => {
                //location.reload();
                $(dom).parent().prev().text(result);
            })
        }

    }

    function getTypes(type = 'big', id = 0) {
        $.get("./api/get_types.php", {
            type,
            id,
        }, (types) => {
            switch (type) {
                case 'big':
                    $("#bigSelect").html(types)
                    break;
                case 'mid':
                    $("#midSelect").html(types)
                    break;
            }
        })
    }

    function addType(type) {
        let big, mid;
        switch (type) {
            case 'big':
                big = $("#big").val();
                $.post('api/add_type.php', {
                    type,
                    big
                }, () => {
                    location.reload();
                    //getTypes('big', 0);
                    //$("#big").val('');
                })
                break;
            case 'mid':
                big = $("#bigSelect").val();
                mid = $("#mid").val();
                $.post('api/add_type.php', {
                    type,
                    big,
                    mid
                }, () => {
                    location.reload();
                })
                break;
        }
    }
</script>