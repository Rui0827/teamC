<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
<link rel="stylesheet" href="css/cart.css">

<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<div class="cart-items">';
    $totalAmount = 0; // カート内合計金額を格納する変数を初期化
    foreach ($_SESSION['Shohin'] as $id => $product) {
        echo '<div class="product">';
        echo '<img alt="image" src="image/products/' . $id . '/top.jpg" width="200" height="200">';
        echo '<h3>' . $product['name'] . '</h3>';
        echo '<p>価格: ' . $product['price'] . '</p>';
        echo '<p>個数: ' . $product['count'] . '</p>';
        $subtotal = $product['price'] * $product['count']; // 小計を計算
        echo '<p>小計: ' . $subtotal . '</p>';
        $totalAmount += $subtotal; // カート内合計金額に小計を加算
        
        // 詳細ページへのリンク
        echo '<a href="detail.php?id=' . $id . '">詳細ページへ</a>';
        echo '<br>';
        echo '<td class="product-info"><a href="cart-delete.php?id=', $id, '">削除</a></td>';

        echo '</div>';
    }
    echo '</div>';

    // カート内全体の合計金額を表示
    echo '<div class="total-amount">';
    echo '<p>カート内合計金額: ' . $totalAmount . '</p>';
    echo '</div>';
    echo '<form action="purchase-input.php" method="post" class="form-buttons">';
    echo '<input type="submit" value="購入する" class="buttonA">';
} else {
    echo 'カートに商品がありません。';
}
?>

    </form>
<button onclick="history.back()">戻る</button>
    </div>
    </div>
</div>