<?php require 'db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品登録</title>
    </head>
    <body>
    <button onclick="location.href='kanrisya_itiran.php'">トップへ戻る</button>
<?php
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('insert into Shohin values(null,?,?,?,?,?,?,now(),null)');
        $sql->execute([$_POST['shohin_name'],$_POST['price'],'image/products/top.jpg',$_POST['details'],$_POST['stock'],$_POST['genre_id']]);  
        $id = $pdo->lastInsertId();
        //$file='image/products/'.$id.'/'.basename($_FILES['photo']['name']);
        $file='image/products/'.$id.'/top.jpg';
        echo '<tr>';
        echo '<td>',$_POST['shohin_name'], '</td>';
        echo '<td>',$_POST['price'], '</td>';
        echo '<td>',$file, '</td>';
        echo '<td>',$_POST['details'], '</td>';
        echo '</tr>';
        echo "\n";
        
        if (!file_exists('image/products/'.$id)) {
            mkdir('image/products/'.$id);
        }
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $file,)) {
            echo $file, 'のアップロードに成功しました';
            echo '<p><img alt="image/products" src="', $file, '" width="500" height="500"></p>';
        }else{
            echo 'アップロードに成功しました';
        }                                               


    }else{
        echo 'ファイルを選択してください';
        exit();
    }
?>
    <form action="touroku-input.php" method="post">
        <button type="submit">追加画面へ戻る</button>
    </form>
    </body>
</html>