<?php session_start(); ?>
<?php $css = 'cart-dilete.css'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['Shohin'][$_GET['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>