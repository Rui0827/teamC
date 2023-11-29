<?php session_start(); ?>
<?php require 'db-connect.php';?>
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
    <head>
        <title>ログイン</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        
<form action="login.php" method="post" name="a" class="form" >
<div class="form-wrapper">

  <h1>ログイン</h1>
  <form>
    <div class="form-item">
      <label for="login-name"></label>
      <input type="text" name="login" required="required" placeholder="ログイン名"></input>
    </div>
    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="パスワード"></input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" name="send" value="ログイン"></input>
    </div>
    <p><?= $msg ?></p>
  </form>

  <div class="form-footer">
    <p><a href="usertoroku.php">新規登録</a>　<a href="kosin-input.php">更新</a></p>
    <p><a href="password.php">パスワードを忘れた方はこちらへ→</a>
  </div>
</div>
</html>