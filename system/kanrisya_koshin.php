<?php require 'db-connect.php'; ?>
<?php
$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=UTF8';
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from Shohin WHERE shohin_id=?'); // ここを更新しました
$sql->execute([$_GET['id']]);// ここを更新しました
$row = $sql->fetch();
$id = $_GET['id'];
$file='image/products/'.$id.'/top.jpg';
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
    <form action="" method="post" enctype="multipart/form-data">
        更新する商品名:<input type="text" name="shohin_name" value="<?= $row['shohin_name'] ?>"><br>
        更新する商品価格:<input type="number" name="price" min="0" value="<?= $row['price'] ?>"><br>
        更新する商品画像パス:<input type="file" id="photo" name="photo" required accept="/system/image/*" value="<?= $row['photo'] ?>"><br>
        <img src="<?= $file ?>" alt="">
        <input type="hidden" name="photo" value="<?= $file ?>">
        <br>
        更新するストック数:<input type="number" name="stock" min="0" value="<?= $row['stock'] ?>"><br>
        更新するジャンル:<select id="product_category" name="genre" required>
            <?php        
        $sql = $pdo->prepare('select * from Genre'); // ここを更新しました
        $sql->execute();
        $data = $sql->fetchAll();
?>

            <option value="" disabled selected>ジャンルを選択してください</option>
            <?php
foreach($data as $row1 ){
    $select= "";
    if($row1['genre_id'] == $row['genre_id']){
        $select=" selected";
    }
    echo '<option value="',$row1['genre_id'],'" ',$select,'>',$row1['name'],'</option>';
}
?>

        </select><br>
        更新する商品詳細:<textarea name="details" id="" cols="30" rows="10"><?= $row['details'] ?></textarea><br>
        <button type="submit">更新</button>
    </form>

    <?php
    
 
    if (!empty($_POST['shohin_name']) && !empty($_POST['price'])) {
        $shohin_name = $_POST['shohin_name'];
        $price = $_POST['price'];
        $photo = $_POST['photo']; 
        $stock = $_POST['stock']; 
        $genre = $_POST['genre'];
        $details = $_POST['details']; 
        
 
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            if (!file_exists('image/products/'.$id)) {
                mkdir('image/products/'.$id);
            }
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $file,)) {
                //echo $file, 'のアップロードに成功しました';
                //echo '<p><img alt="image/products" src="', $file, '" width="400" height="400"></p>';
            }else{
                //echo 'アップロードに成功しました';
            } 
            $photo = $file;
        }

        $day = date("Y-m-d");
        $sql_update = $pdo->prepare('UPDATE Shohin SET shohin_name=?, price=?, photo=?, stock=?, genre_id=?, details=?,koushinbi=? WHERE shohin_id=?'); // ここを更新しました

        if ($sql_update->execute([$shohin_name, $price, $photo, $stock, $genre, $details, $day, $_GET['id']])) { // ここを更新しました
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
    <form action="kanrisya_itiran.php" method="post">
        <button type="submit">一覧画面へ戻る</button>
    </form>
</body>

</html>