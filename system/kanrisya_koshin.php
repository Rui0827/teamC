<?php require 'db-connect.php'; ?>
<?php
$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=UTF8';
?>
 
<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>管理者商品更新</title>
</head>
 
<body>
    <a href="itiran.php">商品一覧へ戻る</a>
    <hr>
    <!-- 更新フォーム -->
    <form action="" method="post">
        商品ID:<input type="text" name="product_id_update"><br>
        更新する商品名:<input type="text" name="product_name_update"><br>
        更新する商品価格:<input type="text" name="price_update"><br>
        更新する商品画像パス:<input type="text" name="product_picture_update"><br> <!-- ここを更新しました -->
        <button type="submit">更新</button>
    </form>
    <?php
    $pdo = new PDO($connect, USER, PASS);
 
    if (!empty($_POST['product_name_update']) && !empty($_POST['price_update'])) {
        $product_name_update = $_POST['product_name_update'];
        $price_update = $_POST['price_update'];
        $product_picture_update = $_POST['product_picture_update']; // ここを更新しました
 
        $day = date("Y-m-d");
        $sql_update = $pdo->prepare('UPDATE NOGOROU SET product_name=?, price=?, picture=?, koushinbi=? WHERE product_id=?'); // ここを更新しました
        if ($sql_update->execute([$product_name_update, $price_update, $product_picture_update, $day, $_POST['product_id_update']])) { // ここを更新しました
            echo '商品情報が更新されました。';
        } else {
            echo '商品情報の更新に失敗しました。';
            print_r($pdo->errorInfo());
        }
    }
    ?>
    <hr>
    <table>
        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>商品説明</th>
            <th>単価</th>
            <th>商品画像パス</th>
            <th>登録日</th>
            <th>更新日</th>
        </tr>
 
        <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('SELECT * FROM NOGOROU') as $row) {
            echo '<tr>';
            echo '<td>', $row['product_id'], '</td>';
            echo '<td>', $row['product_name'], '</td>';
            echo '<td>', $row['text'], '</td>';
            echo '<td>', $row['price'], '</td>';
            echo '<td>', $row['picture'], '</td>'; // ここを更新しました
            echo '<td>', $row['torokubi'], '</td>';
            echo '<td>', $row['koushinbi'], '</td>';
           
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <a href="itiran.php">商品一覧へ戻る</a>
</body>
 
</html>