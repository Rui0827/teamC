<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/usertorokukakunin.css">

    <title>ユーザー登録確認画面</title>
</head>

<body>
    <header>
        <h1>ユーザー登録確認画面</h1>
    </header>
    <form action="usertorokukanryo.php" method="post">
        <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from Customer where account_name=?');
        $sql->execute([$_POST['account_name']]);
        if (empty($sql->fetchAll())) {
            $today = date("Y-m-d");
            $sql = $pdo->prepare('insert into Customer values (null,?,?,?,?,?,?)');
            $sql->execute([
                $_POST['account_name'],
                password_hash($_POST['password'], PASSWORD_DEFAULT),
                $_POST['address'],
                $_POST['Email'],
                $today,
                $today
            ]);
            echo '<div class="CustomerTable">';
            echo 'アカウント名:', $_POST['account_name'];
            echo '</br>';
            echo '住所:', $_POST['address'];
            echo '</br>';
            echo 'メールアドレス:', $_POST['Email'];
            echo '</br>';
            echo 'パスワード:', $_POST['password'];
            echo '</div>';
        } else {
            echo 'アカウント名がすでに使用されていますので、変更してください。';
        }
        ?>
        <div class="wrapper">

            <div class="kakutei">
                <input type="submit" value="確定">
            </div>
    </form>
    <div class="back">
        <form action="usertoroku.php" method="post">
            <input type="submit" value="戻る">
        </form>
    </div>
    </div>



</body>

</html>