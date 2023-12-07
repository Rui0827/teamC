<?php session_start(); ?>
<?php $css = 'cart-insert.css'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'menu2.php'; ?>

<?php
if (isset($_GET['id']) && isset($_SESSION['Shohin'][$_GET['id']])) {
    $id = $_GET['id'];
    unset($_SESSION['Shohin'][$id]);
    echo 'カートから商品を削除しました。';
} else {
    echo '商品の削除に失敗しました。';
}

echo '<hr>';
require 'cart.php';
require 'footer.php';
?>