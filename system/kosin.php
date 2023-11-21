<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<body>
    <a href="top.php">商品一覧へ戻る</a>
    <hr>
    <!-- 更新フォーム -->
    アカウント名:<input type="text" name="account_name"><br>
    パスワード:<input type="password" name="password"><br> <!-- Change input type to password for security -->
    住所:<input type="text" name="address"><br>
    メールアドレス:<input type="text" name="Email"><br>
    登録日:<input type="text" name="torokubi"><br>
    <form action="userkosinkakunin.php" method="post">
        <button type="submit">更新</button>
    </form>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    if (!empty($_POST['account_name']) && !empty($_POST['password'])) {
        $account_name = $_POST['account_name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $address = $_POST['address'];
        $Email = $_POST['Email'];
        $torokubi = $_POST['torokubi'];
        $today = date("Y-m-d");

        $sql_update = $pdo->prepare('UPDATE Customer SET password=?, address=?, Email=?, torokubi=?,koushinbi=? WHERE account_name=?');
        $sql_update->execute([$password, $address, $Email, $torokubi, $today, $account_name]);

        // if (!empty($_POST['account_name']) || !empty($_POST['password']) || !empty($_POST['address']) || !empty($_POST['Email']) || !empty($_POST['torokubi'])) {
        //     echo '商品情報が更新されました。';
        // } else {
        //     echo '商品情報の更新に失敗しました。';
        //     print_r($sql_update->errorInfo()); // Use $sql_update instead of $pdo
        // }
    }
    ?>

    <a href="top.php">商品一覧へ戻る</a>
</body>
<?php require 'footer.php'; ?>