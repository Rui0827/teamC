<?php session_start(); ?>
<?php $css = 'purchase-output.css'; ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>


<?php
$pdo = new PDO($connect, USER, PASS);
$shohin=[];
foreach ($_SESSION['Shohin'] as $shohin_id => $Shohin) {
    $sql = $pdo->prepare('select * from Shohin where shohin_id=?');
    $sql->execute([$shohin_id]);
    $data = $sql->fetch();
    $stock = $data['stock'];
    $name = $data['shohin_name'];
    if ($stock <= 0) {
        echo '<div class="has-text-centered">以下の商品は在庫がないため、購入できませんでした<br>';
        echo $name, '<br>';
        echo '<br>';
        echo '</div>';

    } else if ($stock < $Shohin['count']) {
        echo '<div class="has-text-centered">以下の商品は在庫が足りないため、購入できませんでした<br>';
        echo $name, '<br>';
        echo '<br>';
        echo '</div>';
    } else {
        $stock = $stock - $Shohin['count'];
        $sql = $pdo->prepare('update Shohin set stock=? where shohin_id=?');
        $sql->execute([$stock, $shohin_id]);
        $shohin[] = $name;
    }
}
if(count($shohin)> 0){
    echo '<div class="text">';
    echo '<p>ご注文ありがとうございました。購入した商品は下記になります</p>';
    foreach($shohin as $value){
        echo $value, '<br>';
        echo '<br>';
    }
    echo '</div>';
    unset($_SESSION['Shohin']);
}
?>
    <div class="top">
        <form action="top.php" method="post">
            <input type="submit" name="top" value="トップへ戻る">
        </form>
    </div>
</div>