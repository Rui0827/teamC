<?php require 'db-connect.php'; ?>
<?php
$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=UTF8';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品更新</title>
    <link rel="stylesheet" href="css/kanrisya_koshin.css">
</head>

<body>
    <h1>商品更新</h1>
    <hr>
    <form action="" method="post">
        更新する商品名:<input type="text" name="shohin_name_update"><br>
        更新する商品価格:<input type="text" name="price_update"><br>
        更新する商品画像パス:<input type="text" name="photo_update"><br>
        更新するジャンル:<select id="product_category" name="product_category" required>
            <option value="" disabled selected>ジャンルを選択してください</option>
            <option value="dog">犬用品</option>
            <option value="cat">猫用品</option>
            <option value="hatu">爬虫類</option>
            <option value="fish">魚用品</option>
            <option value="tori">鳥用品</option>
            <option value="syou">小動物用品</option>
            <option value="bug">昆虫用品</option>
        </select><br>
        更新する商品詳細:<input type="text" name="details_update"><br>
        <button type="submit">更新</button>
    </form>
    <?php
    $pdo = new PDO($connect, USER, PASS);
 
    if (!empty($_POST['shohin_name_update']) && !empty($_POST['price_update'])) {
        $product_name_update = $_POST['shohin_name_update'];
        $price_update = $_POST['price_update'];
        $product_picture_update = $_POST['photo_update']; 
 
        $day = date("Y-m-d");
        $sql_update = $pdo->prepare('UPDATE Shohin SET shohin_name=?, price=?, photo=?, koushinbi=? WHERE shohin_id=?'); // ここを更新しました
        if ($sql_update->execute([$shohin_name_update, $price_update, $photo_update, $torokubi, $_POST['shohin_id_update']])) { // ここを更新しました
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
            <th>価格</th>
            <th>写真リンク</th>
            <th>ストック</th>
            <th>商品詳細</th>
            <th>ジャンルID</th>
            <th>登録日</th>
            <th>更新日</th>

        </tr>

        <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('SELECT * FROM Shohin') as $row) {
            echo '<tr>';
            echo '<td>', $row['shohin_id'], '</td>';
            echo '<td>', $row['shohin_name'], '</td>';
            echo '<td>', $row['price'], '</td>';
            echo '<td>', $row['photo'], '</td>'; 
            echo '<td>', $row['stock'], '</td>'; 
            echo '<td>', $row['details'], '</td>'; 
            echo '<td>', $row['genre_id'], '</td>';
            echo '<td>', $row['torokubi'], '</td>';
            echo '<td>', $row['koushinbi'], '</td>';
           
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <a href="kanrisya_itiran.php">商品一覧へ戻る</a>
</body>

</html>