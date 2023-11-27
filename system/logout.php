<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
if (isset($_SESSION['Customer'])) {
    unset($_SESSION['Customer']);
    echo 'ログアウトしました。';
}else{
    echo 'すでにログアウトしています。';
}
?>
<form action="login.php" method="post">
    <input type ="submit" name="modoru" value="戻る">
</form>
<form action="top.php" method="post">
    <input type ="submit" name="top" value="トップへ戻る">
</form>