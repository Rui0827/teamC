<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/usertoroku.css">

    <title>ユーザー登録</title>
</head>

<body>
    <?php
    $account_name = $password = $address = $Email = '';
    if (isset($_SESSION['Customer'])) {
        $account_name = $_SESSION['Customer']['account_name'];
        $password = $_SESSION['Customer']['password'];
        $address = $_SESSION['Customer']['address'];
        $Email = $_SESSION['Customer']['Email'];
    }
    echo '<header>';
    echo '<h1>ユーザー登録</h1>';
    echo '</header>';

    echo '<p>アカウント名とパスワードを入力してください</p>';
    echo '<div class="nyuryoku">';
    echo '<form action="usertorokukakunin.php" method="post">';
    echo '<input type="text" name="account_name" id="account_name" placeholder="アカウント名">';
    echo '</br>';
    echo '<input type="password" name="password" id="password" placeholder="パスワード">';
    echo '</br>';
    echo '<input type="text" name="address" id="address" placeholder="住所">';
    echo '</br>';
    echo '<input type="text" name="Email" id="Email" placeholder="メールアドレス">';
    echo '</div>';

    echo '<div class="wrapper">';
    echo '<div class="back">';
    echo '<input type="button" id="Button" value="戻る">';
    echo '</div>';

    echo '<div class="toroku">';
    echo '<input type="submit" value="登録">';
    echo '</div>';
    echo '</div>';

    echo '</form>';
    ?>
</body>

</html>