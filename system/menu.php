<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>システム開発</title>
<link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <div style="display: inline-block;">
        <img src="image/system/rogo.png" alt="image" width="100">

        <span class="kensaku">
            <form action="product.php" method="post">
                <input type="text" size="50" name="keyword">
                <input class="kensaku-btn" type="submit" value="検索">
            </form>
        </span>

        <span class="button">
            <a href="login.php" class="example">
                <img width="70" src="image/system/rogin.png" alt="ログイン">
            </a>
            <a href="cart.php" class="example">
                <img width="70" src="image/system/cart.png" alt="カート">
            </a>
        </span>
    </div>
    <hr>

    <?php require 'footer.php'; ?>
