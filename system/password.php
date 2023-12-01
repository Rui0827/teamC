<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<?php //パスワードが登録されているか
$password='';
if (isset($_SESSION['Customer'])) {
    $password=$_SESSION['Customer']['password'];
}
?>

<p>パスワードリセット</p>
<form action="reset.php" method="POST">
    <label>
        今までのパスワード
        <input type="password" name="password">
    </label>
    <br>
    <label>
        新しいパスワード
        <input type="password" name="new_password">
    </label>
    <form action="reset.php" method="post">
        <input type="submit" value="送信">
    </form>
</form>