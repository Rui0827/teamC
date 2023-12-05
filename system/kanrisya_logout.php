<?php session_start(); ?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="css/kanrisya_logout.css">


<?php
if (isset($_SESSION['Admin'])) {
    unset($_SESSION['Admin']);
    echo 'ログアウトしました。<br>';
    echo '<a href="kanrisya_login.php">ログイン画面へ</a>';
} else {
    echo 'すでにログアウトしています。';
}
?>
<?php require 'footer.php'; ?>