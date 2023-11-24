<?php session_start(); ?>
<?php require 'db-connect.php';?>
    <?php
    $msg = '';
    if(isset($_POST['send'])){
        unset($_SESSION['Admin']);
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from Admin where account_name=?');
        $sql->execute([$_POST['login']]);
        $data = $sql->fetchAll();
        foreach ($data as $row) {
            if($_POST['password'] === $row['password']){
            $_SESSION['Admin']=[
                'customer_id'=>$row['admin_id'],
                'account_name'=>$row['account_name'],
                'password'=>$row['password'],];
            }
        }
        if (isset($_SESSION['Admin'])){
            header("Location: kanrisya_itiran.php");
            exit;
        }else{
            $msg = 'ログイン名かパスワードが違います';
        }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <h1>ログイン画面</h1>
    <form action="kanrisya_login.php" method="post">
        ログイン名<input type="text" name="login"><br>
        パスワード<input type="password" name="password"><br>
        <p><?= $msg ?></p>
        <input type ="submit" name="send" value="ログイン">
    </form>
</html>