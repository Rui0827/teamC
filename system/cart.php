<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<div class="cart-items">';
    $totalAmount = 0; 
    foreach ($_SESSION['Shohin'] as $id => $product) {
        echo '<div class="product">';
        echo '<img alt="image" src="image/products/' . $id . '/top.jpg" width="200" height="200">';
        echo '<h3>' . $product['name'] . '</h3>';
        echo '<p>価格: ' . $product['price'] . '円</p>';
        echo '<p>個数: ' . $product['count'] . '個</p>';
        $subtotal = $product['price'] * $product['count']; 
        echo '<p>小計: ' . $subtotal . '円</p>';
        $totalAmount += $subtotal; 
        
        echo '<a href="detail.php?id=' . $id . '">詳細ページへ</a>';
        echo '<br>';
        echo '<td class="product-info"><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="total-amount box">';
    echo '<p class="title is-4">カート内合計金額: ' . $totalAmount . '円</p>';
    echo '</div>';
    echo '<div class="buttons is-flex is-justify-content-space-between">';
    echo '<form action="purchase-input.php" method="post" class="form-buttons">';
    echo '<input type="submit" value="購入する" class="button is-success">';
    echo '</form>';
    echo '</div>';
} else {
    echo '<p>カートに商品がありません。</p><br>';
}

    echo '<button onclick="history.back()" class="buttonC button is-info">戻る</button>';

?>