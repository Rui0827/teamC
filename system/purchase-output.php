<?php session_start(); ?>
<?php require 'db-connect.php';?>

<?php
$pdo=new PDO($connect,USER,PASS);

foreach( $_SESSION['Shohin'] as $shohin_id=>$Shohin ){
    $sql=$pdo->prepare('select stock from Shohin where shohin_id=?');
    $sql->execute([$shohin_id]);
    $data = $sql->fetch();
    $stock = $data['stock'];
    $stock = $stock - $Shohin['count'];
    $sql=$pdo->prepare('update Shohin set stock=? where shohin_id=?');
    $sql->execute([$stock, $shohin_id]);
}
?>
<p>ご注文ありがとうございました</p>


<form action="top.php" method="post">
    <input type ="submit" name="top" value="トップへ戻る">
</form>