<?php session_start(); ?>
<?php require 'db-connect.php';?>
<link rel="stylesheet" href="css/login.css">

<?php
    $msg = '';
    if(isset($_POST['send'])){
        unset($_SESSION['Customer']);
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from Customer where account_name=?');
        $sql->execute([$_POST['login']]);
        $data = $sql->fetchAll();
        foreach ($data as $row) {
            if(password_verify($_POST['password'],$row['password']) == true){
            $_SESSION['Customer']=[
                'customer_id'=>$row['customer_id'],
                'account_name'=>$row['account_name'],
                'password'=>$row['password'],
                'address'=>$row['address'],
                'Email'=>$row['Email'],];
            }
        }
        if (isset($_SESSION['Customer'])) {
            header("Location: top.php");
        }else{
            $msg = 'ログイン名かパスワードが違います';
        }
}
?>

<!DOCTYPE html>
<html lang="ja">
<<<<<<< HEAD
    ログイン名<input type="text" name="login"><br>
    パスワード<input type="password" name="password"><br>
    <p><?= $msg ?></p>
    <input type ="submit" name="send" value="ログイン">
    <form action="usertouroku.php" method="post">
        <input type ="submit" name="toroku" value="新規登録">
    </form>
    <form action="kousin.php" method="post">
        <input type ="submit" name="kosin" value="更新">
    </form>
=======
<form action="login.php" method="post">
    ログイン名<input type="text" name="login"><br>
    パスワード<input type="password" name="password"><br>
    <p><?= $msg ?></p>
    <input type="submit" name="send" value="ログイン">
</form>

>>>>>>> e3d86461c5204589fd9e488662ea05922a4b1508
</html>