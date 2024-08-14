<h2 class="ct">商品分類</h2>
<div class="type-list">

</div>



<h2 class="ct">商品管理</h2>
<div class="goods-list">

</div>



<script>
    getGoods();
    getTypeList();

    function sw(action, id) {
        $.post('api/sw.php', {
            id,
            action
        }, () => {
            //location.reload();
            switch (action) {
                case 'up':
                    $(`#g${id}`).html('販售中');
                    break;
                case 'down':
                    $(`#g${id}`).html('已下架');
                    break;
            }
        })
    }

    function getGoods() {
        $(".goods-list").load("./backend/goods_list.php");
    }

    function getTypeList() {
        $(".type-list").load("./backend/type_list.php", function() {
            getTypes();

        });
    }
</script>