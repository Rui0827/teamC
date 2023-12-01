<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>

<?php
$pdo=new PDO($connect, USER, PASS );
if (isset($_SESSION['Customer'])) { //ログインしてるか調べる

        if (password_verify($_POST['password'],$row['password']) == ture) {//
            $sql=$pdo->prepare('update Customer set password=? where customer_id=?');//データーベース更新
            $sql->execute ([  
            $_POST['new_password'],$_SESSION['Customer']['customer_id'] 
            ]);
            $_SESSION['Customer']=[ //セッションデータ更新
                'customer_id'=>$id, 'password'=>$_POST['new_password']];
            echo 'パスワードを更新しました。';
        }else{
            echo 'パスワードが違います。';
        }
}else{
    echo 'ログインしてください。';
}
?>