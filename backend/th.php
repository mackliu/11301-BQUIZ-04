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
    <tr class="tt">
        <td>a</td>
        <td class='ct'>
            <button>修改</button>
            <button onclick="del('Type',id)">刪除</button>
        </td>
    </tr>
    <tr class="pp ct">
        <td>c</td>
        <td>
            <button>修改</button>
            <button onclick="del('Type',id)">刪除</button>
        </td>
    </tr>
</table>


<h2 class="ct">商品管理</h2>