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
    <p>
    <form action="usertorokukanryo.php" method="post">
        <?php
        $pdo = new PDO($connect, USER, PASS);
        if (isset($_SESSION['Customer'])) {
            $id = $_SESSION['Customer']['customer_id'];
            $sql = $pdo->prepare('select * from Customer where customer_id!=? and password=?');
            $sql->execute([$id, $_POST['account_name']]);
        } else {
            $sql = $pdo->prepare('select * from Customer where customer_id=?');
            $sql->execute([$_POST['account_name']]);
        }
        if (empty($sql->fetchAll())) {
            if (isset($_SESSION['Customer'])) {
                $sql = $pdo->prepare('update Customer set account_name=?, address=?,' .
                    'Email=?, password=? where customer_id=?');

                $sql->execute([
                    $_POST['account_name'],
                    $_POST['password'],
                    $_POST['address'],
                    $_POST['Email'],
                    $id
                ]);
                $_SESSION['Customer'] = [
                    'customer_id' => $id,
                    'account_name' => $_POST['account_name'],
                    'address' => $_POST['address'],
                    'Email' => $_POST['Email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ];
                echo 'お客様情報を更新しました。';
            } else {
                $sql = $pdo->prepare('insert into Customer (account_name, address, Email, password) values (?,?,?,?)');
                $sql->execute([
                    $_POST['account_name'],
                    $_POST['address'],
                    $_POST['Email'],
                    password_hash($_POST['password'], PASSWORD_DEFAULT)
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
            }
        } else {
            echo 'すでに使用されていますので、変更してください。';
        }
        ?>
        </p>
        <div class="wrapper">
            <div class="back">
                <form action="usertoroku.php" method="post">
                    <input type="submit" value="戻る">
                </form>
            </div>

            <div class="kakutei">
                <input type="submit" value="確定">
            </div>
        </div>
    </form>



</body>

</html>