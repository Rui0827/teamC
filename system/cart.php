<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
<link rel="stylesheet" href="css/cart.css">

<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<div class="cart-items">';

    // Flexbox コンテナを開始
    echo '<div class="products-container">';

    foreach ($_SESSION['Shohin'] as $id => $product) {
        echo '<div class="product">';
        echo '<img src="product_images/' . $id . '.jpg" alt="' . $product['name'] . '">';
        echo '<h3>' . $product['name'] . '</h3>';
        echo '<p>価格: ' . $product['price'] . '</p>';
        // 数量を変更するフォームを追加
        echo '<form action="update-cart.php" method="post">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo '<label for="quantity">数量:</label>';
        echo '<input type="number" name="quantity" id="quantity" value="' . $product['count'] . '" min="1">';
        echo '<input type="submit" value="更新">';
        echo '</form>';
        echo '<p>小計: ' . ($product['price'] * $product['count']) . '</p>';
        echo '</div>';
    }

    // Flexbox コンテナを終了
    echo '</div>';

    echo '</div>';
} else {
    echo 'カートに商品がありません。';
}
?>




<form action="top.php" method="post" class="form-buttons">
    <input type="submit" value="戻る" class="buttonB">
</form>