<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<table class="cart-table">';
    echo '<tr><th>商品番号</th><th>商品名</th>';
    echo '<th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
    $total=0;
    foreach ($_SESSION['Shohin'] as $id=>$product) {
        echo '<tr>';
        echo '<td>',$id, '</td>';
        echo '<td class="product-info"><a href="detail.php?id=', $id, '">', $product['name'], '</a></td>';
        echo '<td class="product-info">', $product['price'], '</td>';
        echo '<td class="product-info">', $product['count'], '</td>';
        $subtotal=$product['price']*$product['count'];
        $total+=$subtotal;
        echo '<td class="product-info">', $subtotal, '</td>';
        echo '<td class="product-info"><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
    }
    echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total,
         '</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに商品がありません。';
    echo '<form action="top.php" method="post">';
    echo '<input type="submit" value="戻る">';
    echo '</form>';
}
?>
<form action="purchase-input.php" method="post">
    <input type="submit" value="購入する">
</form>