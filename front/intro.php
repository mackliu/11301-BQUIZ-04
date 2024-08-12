<?php
$row = $Goods->find($_GET['id']);

?>
<h2 class="ct"><?= $row['name']; ?></h2>