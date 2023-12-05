<?php session_start(); ?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="css/kanrisya_delete.css">


<?php
if (isset($_SESSION['Admin'])) {
    unset($_SESSION['Admin']);
    echo 'ログアウトしました。';
    echo '<a href="kanrisya_login.php">ログイン画面へ</a>';
} else {
    echo 'すでにログアウトしています。';
}
?>
<?php require 'footer.php'; ?>