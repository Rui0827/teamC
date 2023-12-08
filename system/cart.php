<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<div class="columns is-multiline">'; 
    foreach ($_SESSION['Shohin'] as $id => $product) {
        echo '<div class="column is-one-quarter">'; 
        echo '<div class="card">';
        echo '<div class="card-image">';
        echo '<figure class="image is-4by3">';
        echo '<img src="image/products/' . $id . '/top.jpg" alt="商品画像">';
        echo '</figure>';
        echo '</div>';
        echo '<div class="card-content">';
        echo '<p class="title is-6">' . $product['name'] . '</p>'; 
        echo '<p>価格: ' . $product['price'] . '円</p>';
        echo '<p>個数: ' . $product['count'] . '個</p>';
        $subtotal = $product['price'] * $product['count'];
        echo '<p>小計: ' . $subtotal . '円</p>';
        echo '<a href="detail.php?id=' . $id . '" class="button is-primary is-small">詳細ページへ</a>';
        echo '<a href="cart-delete.php?id=' . $id . '" class="button is-danger is-small">削除</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
   
    // 合計金額の計算
    $totalAmount = 0;
    foreach ($_SESSION['Shohin'] as $product) {
        $totalAmount += $product['price'] * $product['count'];
    }

    echo '<div class="total-amount box">';
    echo '<p class="title is-4">カート内合計金額: ' . $totalAmount . '円</p>';
    echo '</div>';
    
    echo '<div class="buttons is-flex is-justify-content-space-between">';
    echo '<form action="purchase-input.php" method="post" class="form-buttons">';
    echo '<input type="submit" value="購入する" class="button is-success">';
    echo '</form>';
    echo '<form action="product.php" style="display: inline-block;">';
    echo '<input type="submit" class="button is-info" value="商品一覧に戻る">';
    echo'</form>';
    echo '</div>';
} else {
    echo '<p>カートに商品がありません。</p>';
}
?>