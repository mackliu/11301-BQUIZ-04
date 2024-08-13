<?php
include_once "./api/base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <style>
        .round {
            display: inline-flex;
            background: orange;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./icon/0416.jpg" style="width:50%">
            </a>
            <div style=" padding:10px;display:inline-block">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車
                    <span id='cart'>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            echo "<div class='round'>";
                            echo count($_SESSION['cart']);
                            echo "</div>";
                        }
                        ?>
                    </span>
                </a> |
                <?php
                if (isset($_SESSION['Mem'])) {
                    echo "<a href='./api/logout.php?user=mem'>登出</a> |";
                } else {
                    echo "<a href='?do=login'>會員登入</a> |";
                }
                ?>

                <?php
                if (isset($_SESSION['Admin'])) {
                    echo "<a href='admin.php'>返回管理</a>";
                } else {
                    echo "<a href='?do=admin'>管理登入</a>";
                }
                ?>
            </div>
            <marquee>
                年終特賣會開跑了 &nbsp; 情人節特惠活動
            </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <div class="ww">
                    <a href="?type=0">全部商品</a>
                </div>
                <?php
                $bigs = $Type->all(['big_id' => 0]);
                foreach ($bigs as $big) {
                    echo "<div class='ww'>";
                    echo "<a href='?type={$big['id']}'>{$big['name']}</a>";
                    if ($Type->count(['big_id' => $big['id']]) > 0) {
                        $mids = $Type->all(['big_id' => $big['id']]);
                        echo "<div class='s'>";
                        foreach ($mids as $mid) {
                            echo "<a href='?type={$mid['id']}'>{$mid['name']}</a>";
                        }
                        echo "</div>";
                    }
                    echo "</div>";
                }

                ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;"> 00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
            $do = $_GET['do'] ?? 'main';
            $file = "front/$do.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include 'front/main.php';
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            <?= $Bottom->find(1)['bottom']; ?></div>
    </div>

</body>

</html>