<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショッピングカート</title>
    <?php require 'db-connect.php'; ?>
    <link rel="stylesheet" href="css/ka-to.css">
</head>

<body>
    <h1>ショッピングカート</h1>

    <div class="cart-items">
        <a href="product1.html" class="cart-item-link">
            <div class="cart-item">
                <img src="product1.jpg" alt="商品1">
                <div class="item-details">
                    <p>商品1</p>
                    <p>価格: ¥1,000</p>
                    <input type="number" value="1" min="1">
                    <p>合計: ¥1,000</p>
                    <button>削除</button>
                </div>
        </a>
    </div>
    <a href="product2.html" class="cart-item-link">
        <div class="cart-item">
            <img src="product2.jpg" alt="商品2">
            <div class="item-details">
                <p>商品2</p>
                <p>価格: ¥800</p>
                <input type="number" value="2" min="1">
                <p>合計: ¥1,600</p>
                <button>削除</button>
            </div>
    </a>
    </div>
    </div>

    <div class="cart-total">
        <p>合計: ¥2,600</p>
    </div>

    <button class="order-button">注文する</button>
    <a href="#" class="back-button">戻る</a>

    <script src="script.js"></script> <!-- JavaScriptファイルのリンク -->
</body>

</html>