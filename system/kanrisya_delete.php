<?php require 'db-connect.php'; ?>
<?php
 
$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=UTF8';
?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <title>管理者削除</title>
</head>
 
<body>
    <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('delete from Shohin where shohin_id=?');
          if($sql->execute([$_GET['id']])){
               echo '削除に成功しました。';
 
          }else{
                echo '削除に失敗しました。';
          }
    ?>
    <br>
    <hr><br>
    <table>
            <tr><th>商品ID</th><th>商品名</th><th>価格</th><th>商品詳細</th><th>ジャンルID</th><th>写真リンク</th><th>登録日</th><th>更新日</th></tr>
            
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