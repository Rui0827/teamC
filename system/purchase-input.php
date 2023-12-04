<?php session_start(); ?>
<?php require 'header.php'; ?>

<link rel="stylesheet" href="css/purchase.css">

<?php
if (isset($_SESSION['Customer'])) {
    if( !empty($_SESSION['Shohin']) ){
        echo '<table>';
        echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
        $total=0;

        foreach( $_SESSION['Shohin'] as $shohin_id=>$Shohin ){
            echo '<tr>';
            echo '<td>', $shohin_id, '</td>';
            echo '<td>', $Shohin['name'], '</td>';
            echo '<td>', $Shohin['price'], '</td>';
            echo '<td>', $Shohin['count'], '</td>';
            $stock = $Shohin['count'];
            $subtotal= $Shohin['price'] * $Shohin['count'];
            $total += $subtotal;
            echo '<td>', $total, '</td>';
            echo '</tr>';
            echo '<br>';
        }
        
        echo '<br>';
        echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total,
             '円</td><td></td></tr>';
        echo '</table>';
        echo '<br>';
        echo '<form action="purchase-output.php" style="display: inline-block;">';
        echo '<input type="submit" class="decision" value="注文を確定する">';
        echo '</form>';
    
    }else{
        echo 'カートに商品がありません。';
    }
}else{
    echo 'ログインしてください。';
}
?>
<br>
<div class="back">
    <form action="cart-show.php" style="display: inline-block;">
        <input type="submit" class="back" value="戻る">
    </form>
</div>

<?php require 'footer.php'; ?>