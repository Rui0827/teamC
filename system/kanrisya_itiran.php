<?php
    const SERVER = 'mysql216.phy.lolipop.lan';
    const DBNAME = 'LAA1517370-petgoods3150';
    const USER = 'LAA1517370';
    const PASS = 'asou2023';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品一覧画面</title>
    
    </head>
        
    <body>
        
        <h1>商品一覧</h1>
        <br>
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
        echo '<a href="kanrisya_delete.php?id=',$row['shohin_id'],'">削除</a>';

        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
        </table>
        <br>
        <div>
            <button onclick="location.href='.php'">戻る</button>
            <button onclick="location.href='.php'">登録</button>
        </div>
    </body>
</html>