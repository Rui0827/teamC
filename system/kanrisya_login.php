<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php

$msg = '';
if(isset($_POST['send'])){
    unset($_SESSION['Admin']);
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from Admin where account_name=? and password=?');
    $sql->execute([$_POST['login'],$_POST['password']]);
    $data = $sql->fetchAll();
    foreach ($data as $row) {
        $_SESSION['Admin']=[
            'admin_id'=>$row['admin_id'],
        'account_name'=>$row['account_name'],
        'password'=>$row['password'],];
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kanrisya_login.css">
    <title>管理者ログイン</title>
</head>
<html lang="ja">
<h1>ログイン画面</h1>
<form action="kanrisya_login.php" method="post">
    ログイン名<input type="text" name="login"><br>
    パスワード<input type="password" name="password"><br>
    <p><?= $msg ?></p>
    <input type="submit" name="send" value="ログイン">
</form>

</html>