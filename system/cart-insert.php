<?php session_start(); ?>
<?php $css = 'cart-insert.css'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'menu2.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<?php
$id=$_POST['id'];
if (!isset($_SESSION['Shohin'])) {
    $_SESSION['Shohin']=[];
}
$count=0;
if (isset($_SESSION['Shohin'][$id])) {
    $count=$_SESSION['Shohin'][$id]['count'];
}
$_SESSION['Shohin'][$id]=[
    'name'=>$_POST['name'],
    'price'=>$_POST['price'],
    'count'=>$count+$_POST['count']
];
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>