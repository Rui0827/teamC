<?php session_start(); ?>
<?php require 'db-connect.php';?>

<?php
$pdo=new PDO($connect,USER,PASS);
if (isset($_SESSION['Customer'])) {
    $id=$_SESSION['Customer']['customer_id'];
    $sql=$pdo->prepare('select * from Customer where customer_id!=? and account_name=?');
    $sql->execute([$id, $_POST['name']]);
} else {
    $sql=$pdo->prepare('select * from Customer where account_name=?');
    $sql->execute([$_POST['name']]);
}
if (empty($sql->fetchAll())) {
    if (isset($_SESSION['Customer'])) {
        $sql=$pdo->prepare('update Customer set account_name=?, password=?, address=?, Email=? where customer_id=?');
        $sql->execute ([
            $_POST['name'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['address'], $_POST['Email'], $_SESSION['Customer']['customer_id']
        ]);
        $_SESSION['Customer']=[
            'customer_id'=>$id, 'account_name'=>$_POST['name'], 'password'=>password_hash($_POST['password'], PASSWORD_DEFAULT),
            'address'=>$_POST['address'], 'Email'=>$_POST['Email']];
        echo 'お客様情報を更新しました。';
    }else{
        echo 'お客様情報を更新できませんでした。ログインしているか確認してください';
    }
}else{
    echo 'ログイン名が他の人と被っています、他のログイン名に変えてください。';
}
?>
<form action="top.php" method="post">
    <input type ="submit" name="top" value="トップへ戻る">
</form>