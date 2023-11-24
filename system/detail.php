<?php session_start(); ?>
<?php require 'db-connect.php'; ?>

<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from Shohin where shohin_id=?');
$sql->execute([$_GET['shohin_id']]);
foreach ($sql as $row) {
    echo '<p><img alt="image" src="image/', $row['shohin_id'], '.jpg"></p>';
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>商品番号:', $row['shohin_id'], '</p>';
    echo '<p>商品名:', $row['shohin_name'], '</p>';
    echo '<p>価格:', $row['price'], '</p>';
    echo '<p>個数:<select name="count">';
    for ($i = 1; $i <= 10; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }
    echo '</select></p>';
    echo '<input type="hidden" name="id" value="', $row['shohin_id'], '">';
    echo '<input type="hidden" name="name" value="', $row['shohin_name'], '">';
    echo '<input type="hidden" name="price" value="', $row['price'], '">';
    echo '<p><input type="submit" value="カートに追加"></p>';
    echo '</form>';
    echo '<p><a href="favorite-insert.php?id=', $row['shohin_id'], '">お気に入りに追加</a></p>';
}
?>