<?php session_start(); ?>
<?php $css = 'product.css'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'menu2.php'; ?>
<?php require 'db-connect.php'; ?>

<?php
    echo '<table>';
    $pdo=new PDO($connect, USER, PASS );

    if(isset($_GET['id'])){
        $sql=$pdo->prepare('select * from Shohin where genre_id = ?');
        $sql->execute([$_GET['id']]);
    }
    else if( isset($_POST['keyword']) ){
        $sql=$pdo->prepare('select * from Shohin where shohin_name like ?');
        $sql->execute(['%'.$_POST['keyword'].'%']);
    }else{
        $sql=$pdo->query('select * from Shohin');
    }
    foreach( $sql as $row ){
        $id=$row['shohin_id'];
        $stock=$row['stock'];
        echo '<tr>';
        echo '<td>';
        echo '<a href="detail.php?id=', $id, '">', '<img src="image/products/', $id, '/top.jpg" width="500" hight="500"></a>';
        if($stock == 0){
            echo '<p>SOLD OUT</p>';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';

?>

<?php require 'footer.php'; ?>