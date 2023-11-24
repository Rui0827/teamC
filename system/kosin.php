<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<body>
    <form method="post">
        <label for="name">アカウント名：</label>
        <input type="text" name="name">
        <input type="submit" value="検索">
    </form>
    <?php

    if (isset($_POST['name'])) {
        $pdo = new PDO('mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8', USER, PASS);
        $sql = $pdo->prepare('SELECT * FROM Customer WHERE account_name LIKE ?');
        $sql->execute(['%' . $_POST['name'] . '%']);

        if (isset($_POST['customer_id'])) {
            // Update the 'koshinbi' column with the current date when updating the data
            $sql = $pdo->prepare('UPDATE Customer SET account_name = ?, password = ?, address = ?, Email = ?, torokubi= ?,koushinbi = NOW() WHERE');
            $sql->execute([$_POST['account_name'], $_POST['password'], $_POST['addres'], $_POST['Email'], $_POST['torokubi'], $_['koushinbi']]);
            echo '更新しました';
        }
        foreach ($sql as $row) {
            echo '<tr>';
            echo '<form action="kosin.php" method="post">';
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

            echo '<td>';
            echo '<input type="text" name="pass" value="', $row['koushinbi'], '">';
            echo '</td> ';

            echo '<td><input type="submit" value="更新"></td>';

            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
    } else {
    }
    ?>
    <br><button onclick="location.href='top.php'">トップへ戻る</button>
</body>
<?php require 'footer.php'; ?>