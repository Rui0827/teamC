<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
    if( !empty($_SESSION['Shohin']) ){
        echo '<table>';
        echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
        $total=0;

        foreach( $_SESSION['Shohin'] as $shohin_id=>$Shohin ){
            echo '<tr>';
            echo '<td>', $shohin_id, '</td>';
            echo '<td><a href="detail.php?id=', $shohin_id, '">',
                 $Shohin['shohin_name'], '</a></td>';
            echo '<td>', $Shohin['price'], '</td>';
            echo '<td>', $Shohin['count'], '</td>';
            $subtotal= $Shohin['price'] * $Shohin['count'];
            $total += $subtotal;
            echo '<td>', $total, '</td>';
            echo '</tr>';
        }
        
        echo '<br>';
        echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total,
             '</td><td></td></tr>';
        echo '</table>';
    
    }else{
        echo 'カートに商品がありません。';
    }
?>
    <br>
    <br>
    <form action="cart.php" style="display: inline-block;">
        <input type="submit" value="戻る">
    </form>

    <form action="purchase-output.php" style="display: inline-block;">
        <input type="submit" value="注文を確定する">
    </form>

<?php require 'footer.php'; ?>
