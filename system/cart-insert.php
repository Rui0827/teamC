<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$id=$_POST['id'];
if (!isset($_SESSION['Shohin'])) {
    $_SESSION['Shohin']=[];
}
$count=0;
if (isset($_SESSION['Shohin']['shohin_id'])) {
    $count=$_SESSION['Shohin'][$id]['count'];
}
$_SESSION['Shohin'][$id]=[
    'name'=>$_POST['shohin_name'],
    'price'=>$_POST['price'],
    'count'=>$count+$_POST['count']
];
echo '<p>カートに商品を追加をしました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>