<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
if (isset($_SESSION['Customer'])) {
    unset($_SESSION['Customer']);
    $msg = 'ログアウトしました。';
}else{
    $msg = 'すでにログアウトしています。';
}
?>
<link rel="stylesheet" href="css/logout.css">
<body>
<div class="form-wrapper">
    <h2><?= $msg ?></h2>
    <div class="form-footer">
        <p><a href="top.php">トップへ戻る</a>
    </div>
</div>
</body>