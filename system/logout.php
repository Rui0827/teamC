<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
if (isset($_SESSION['customer'])) {
    unset($_SESSION['customer']);
    echo 'ログアウトしました。';
}else{
    echo 'すでにログアウトしています。';
}
?>