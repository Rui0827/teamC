<?php session_start(); ?>

<?php
$msg = '';
$name = $password = $address = $Email = '';
if (isset($_SESSION['Customer'])) {
    $name = $_SESSION['Customer']['account_name'];
    $address = $_SESSION['Customer']['address'];
    $Email = $_SESSION['Customer']['Email'];
}else{
    $msg = 'ログインしてから更新してください。';
}
?>
<h1>更新する情報を入力して下さい</h1>
<form action="kosin-output.php" method="post">
    <div class="nyuryoku">
        <table>
            <div class="name">
                <tr>
                    <td>お名前</td>
                    <td><input type="text" name="name" value="<?= $name ?>"></td>
                </tr>
            </div>
            <div class="password">
                <tr>
                    <td>パスワード</td>
                    <td>
                        <input type="text" name="password" value="<?= $password ?>">
                    </td>
                </tr>
            </div>
            <div class="address">
                <tr>
                    <td>住所</td>
                    <td>
                        <input type="text" name="address" value="<?= $address ?>">
                    </td>
                </tr>
            </div>
            <div class="email">
                <tr>
                    <td>Eメール</td>
                    <td>
                        <input type=" text" name="Email" value="<?= $Email ?>">
                    </td>
                </tr>
            </div>
        </table>
        </br>
    </div>
    <p><?= $msg ?></p>
    <div class="botan">
        <div class="touroku">
            <input type="submit" value="登録">
        </div>
</form>
<div class="modoru">
    <form action="top.php" method="post">
        <input type="submit" value="戻る">
    </form>
</div>
<div class="out">
    <form action="logout.php" method="post">
        <input type="submit" value="ログアウト">
    </form>
</div>
</div>
<style>
<?php include "css/kosin.css"?>
</style>