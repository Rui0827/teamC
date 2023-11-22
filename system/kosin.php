<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<body>
    <a href="top.php">商品一覧へ戻る</a>
    <hr>
    <!-- 更新フォーム -->
    アカウント名:<input type="text" name="account_name"><br>
    パスワード:<input type="password" name="password"><br>
    住所:<input type="text" name="address"><br>
    メールアドレス:<input type="text" name="Email"><br>
    登録日:<input type="text" name="torokubi"><br>
    <form action="userkosinkakunin.php" method="post">
        <button type="submit">更新</button>
    </form>
    <?php
    if (isset($_POST['account_name'])) {
        $pdo = new PDO('mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8', USER, PASS);
        $sql = $pdo->prepare('SELECT * FROM Customer WHERE account_name LIKE ?');
        $sql->execute(['%' . $_POST['account_name'] . '%']);

        if (isset($_POST['customer_id'])) {
            // Update the 'koshinbi' column with the current date when updating the data
            $sql = $pdo->prepare('UPDATE Customer SET account_name = ?, password = ?, address = ?, Email = ?, torokubi = ?,koushinbi = NOW() WHERE id = ?');
            $sql->execute([$_POST['account_name'], $_POST['password'], $_POST['address'], $_POST['Email'], $_POST['torokubi'], $_POST['koushinbi']]);
            echo '更新しました';
        }
        foreach ($sql as $row) {
            echo '<tr>';
            echo '<form action="" method="post">';
            echo '<td> ';
            echo '<p>', $row['customer_id'], '<p>';
            echo '</td> ';

            echo '<td> ';
            echo '<input type="text" name="id" value="', $row['account_name'], '">';
            echo '</td> ';

            echo '<td>';
            echo '<input type="text" name="name" value="', $row['password'], '">';
            echo '</td> ';

            echo '<td>';
            echo '<input type="text" name="setumei" value="', $row['address'], '">';
            echo '</td> ';

            echo '<td>';
            echo '<input type="text" name="tanka" value="', $row['Email'], '">';
            echo '</td> ';

            echo '<td>';
            echo '<input type="text" name="pass" value="', $row['torokubi'], '">';
            echo '</td> ';

            echo '<p>', $row['koushinbi'], '<p>';
            echo '</td> ';

            echo '<td><input type="submit" value="更新"></td>';

            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
    } else {
        echo "商品名を入力してください。";
    }
    ?>

    <a href="top.php">商品一覧へ戻る</a>
</body>
<?php require 'footer.php'; ?>