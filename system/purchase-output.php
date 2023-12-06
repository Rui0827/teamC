<?php session_start(); ?>
<?php $css = 'purchase-output.css'; ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>


<?php
$pdo = new PDO($connect, USER, PASS);

foreach ($_SESSION['Shohin'] as $shohin_id => $Shohin) {
    $sql = $pdo->prepare('select * from Shohin where shohin_id=?');
    $sql->execute([$shohin_id]);
    $data = $sql->fetch();
    $stock = $data['stock'];
    $name = $data['shohin_name'];
    if ($stock <= 0) {
        echo '以下の商品は在庫がないため、購入できませんでした<br>';
        echo $name, '<br>';
        echo '<br>';

    } else if ($stock < $Shohin['count']) {
        echo '以下の商品は在庫が足りないため、購入できませんでした<br>';
        echo $name, '<br>';
        echo '<br>';
    } else {
        $stock = $stock - $Shohin['count'];
        $sql = $pdo->prepare('update Shohin set stock=? where shohin_id=?');
        $sql->execute([$stock, $shohin_id]);
    }
}
?>
<div class="text">
    <p>ご注文ありがとうございました</p>

    <div class="top">
        <form action="top.php" method="post">
            <input type="submit" name="top" value="トップへ戻る">
        </form>
    </div>
</div>