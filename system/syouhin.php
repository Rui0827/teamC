<?php
// データベース接続ファイルのインポート
require 'db-connect.php';

if (isset($_GET['shohin_id']) && is_numeric($_GET['shohin_id'])) {
    $productId = $_GET['shohin_id'];

    $sql = "SELECT * FROM shohin WHERE shohin_id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/syouhin.css">
    <title>商品詳細</title>
</head>

<body>
    <h1>商品詳細</h1>

    <div class="product-details">
        <div class="product-image">
            <img src="<?php echo $row['photo']; ?>" alt="商品画像">
        </div>

        <div class="product-info">
            <h2><?php echo $row['shohin_name']; ?></h2>
            <p>価格: ¥<?php echo number_format($row['price']); ?></p>
            <p>在庫: <?php echo $row['stock']; ?>個</p>
            <p>カテゴリ: <?php echo $row['genre_id']; ?></p>
            <p>商品説明: <?php echo $row['details']; ?></p>
        </div>
    </div>

    <div class="button-container">
        <button onclick="addToCart(<?php echo $productId; ?>)" class="green-button">カートに入れる</button>
        <button onclick="buyNow(<?php echo $productId; ?>)" class="yellow-button">すぐに購入</button>
    </div>

    <button class="back-button pink-button" onclick="goBack()">戻る</button>

    <script>
    function addToCart(productId) {
        window.location.href = "add_to_cart.php?shohin_id=" + productId;
    }

    function buyNow(productId) {
        window.location.href = "buy_now.php?shohin_id=" + productId;
    }

    function goBack() {
        window.history.back();
    }
    </script>
</body>

</html>
<?php
    } else {
        echo "商品が見つかりませんでした。";
    }
    $conn->close();
} else {
    echo "不正なリクエストです。";
}
?>