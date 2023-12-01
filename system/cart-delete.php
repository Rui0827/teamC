<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>カートの商品削除</title>
    <link rel="stylesheet" href="cart-insert.css"> <!-- your-css-file.cssにはCSSファイルのパスを記述 -->
</head>

<body>

    <?php
if (isset($_GET['id']) && isset($_SESSION['Shohin'][$_GET['id']])) {
    $id = $_GET['id'];
    unset($_SESSION['Shohin'][$id]);
    echo 'カートから商品を削除しました。';
} else {
    echo '商品の削除に失敗しました。';
}

echo '<hr>';
require 'cart.php';
?>

</body>

</html>