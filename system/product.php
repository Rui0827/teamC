<?php session_start(); ?>
<?php $css = 'product.css'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'menu2.php'; ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="css/product.css">


<?php
echo '<div class="product-container">'; // コンテナ追加
echo '<table class="product-table">';
$pdo=new PDO($connect, USER, PASS );

if(isset($_GET['id'])){
    $sql=$pdo->prepare('select * from Shohin where genre_id = ?');
    $sql->execute([$_GET['id']]);
}
else if( isset($_POST['keyword']) ){
    $sql=$pdo->prepare('select * from Shohin where shohin_name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
}else{
    $sql=$pdo->query('select * from Shohin');
}

echo '<tr class="product-row">'; // 商品画像の新しい行の開始
foreach( $sql as $row ){
    $id=$row['shohin_id'];
    $stock=$row['stock'];
    echo '<td class="product-cell">'; // 商品画像のセル
    echo '<a href="detail.php?id=', $id, '">', '<img src="image/products/', $id, '/top.jpg" width="200" height="200"></a>';
    if($stock <= 0){
        echo '<p>SOLD OUT</p>';
    }
    echo '</td>';
}
echo '</tr>'; // 商品画像の新しい行の終了

echo '</table>';
echo '</div>'; // コンテナ終了
?>

<br>
<form action="top.php">
    <input class="return-to-top" type="submit" value="戻る">
</form>

<?php require 'footer.php'; ?>