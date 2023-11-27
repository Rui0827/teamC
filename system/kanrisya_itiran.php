<?php require 'db-connect.php'; ?>
<?php
    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品一覧画面</title>
    <link rel="stylesheet" href="css/kanrisya_itiran.css">
</head>

<body>

    <h1>商品一覧</h1>
    <br>
    <table>
        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>価格</th>
            <th>商品詳細</th>
            <th>ジャンルID</th>
            <th>写真リンク</th>
            <th>登録日</th>
            <th>更新日</th>
            <th>処理</th>
        </tr>

        <?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from Shohin') as $row) {
        echo '<tr>';
        echo '<td>', $row['shohin_id'], '</td>';
        echo '<td>', $row['shohin_name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>', $row['details'], '</td>';
        echo '<td>', $row['genre_id'], '</td>';
        echo '<td>', $row['photo'], '</td>';
        echo '<td>', $row['torokubi'], '</td>';
        echo '<td>', $row['koushinbi'], '</td>';
        echo '<td>';
        echo '<a href="kanrisya_koshin.php?id=',$row['shohin_name'],'"class="update">更新</a>';
        echo '<a href="kanrisya_delete.php?id=',$row['shohin_id'],'"class="delete">削除</a>';

        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    <br>

    <div class="rui">
        <form action="kanrisya_login.php" method="post">
            <div class="logout">
                <input type="submit" value="ログアウト">
            </div>
        </form>

        <form action="touroku-input.php" method="post">
            <div class="register">
                <input type="submit" value="登録">
            </div>
        </form>
    </div>
</body>

</html>