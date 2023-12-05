<?php session_start(); ?>
<?php $css = 'detail.css'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="css/detail.css">

<div class="container">
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from Shohin where shohin_id=?');
    $sql->execute([$_GET['id']]);
    foreach ($sql as $row) {
        echo '<div class="product-info">'; 

        echo '<div class="product-details">';
        echo '<img alt="image" src="image/products/', $row['shohin_id'], '/top.jpg" width="500" height="500">';
        echo '<p>商品番号:', $row['shohin_id'], '</p>';
        echo '<p>商品名:', $row['shohin_name'], '</p>';
        echo '<p>価格:', $row['price'], '</p>';
        echo '<form action="cart-insert.php" method="post">';
        echo '<p>個数:<select name="count">';
        for ($i = 1; $i <= 10; $i++) {
            echo '<option value="', $i, '">', $i, '</option>';
        }
        echo '</select></p>';
        echo '<input type="hidden" name="id" value="', $row['shohin_id'], '">';
        echo '<input type="hidden" name="name" value="', $row['shohin_name'], '">';
        echo '<input type="hidden" name="price" value="', $row['price'], '">';

        if ($row['stock'] <= 0){
            echo '<button disabled>SOLD OUT</button>';
            echo '<br>';
        }else{
            echo '<input class="add-to-cart" type="submit" value="カートに追加">';
        }
        echo '</form>';

        echo '<form action="product.php" method="post">';
        echo '<input class="return-to-cart" type="submit" value="戻る">';
        echo '</form>';
        echo '</div>'; 

        echo '</div>'; 
    }
    ?>
</div>

<?php require 'footer.php'; ?>