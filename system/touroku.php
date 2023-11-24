<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/touroku.css">
    <title>商品登録</title>
</head>

<body>
    <h1>商品登録</h1>
    <form action="登録処理を行うスクリプトのURL" method="POST" enctype="multipart/form-data">
        <label for="product_name">商品名:</label>
        <input type="text" id="product_name" name="product_name" required><br><br>

        <label for="product_price">価格:</label>
        <input type="number" id="product_price" name="product_price" required min="0"><br><br>

        <label for="product_image">商品画像:</label>
        <input type="file" id="product_image" name="product_image" accept="image/*"><br><br>

        <label for="product_category">ジャンル:</label>
        <select id="product_category" name="product_category" required>
            <option value="" disabled selected>ジャンルを選択してください</option>
            <option value="dog">犬用品</option>
            <option value="cat">猫用品</option>
            <option value="hatu">爬虫類</option>
            <option value="fish">魚用品</option>
            <option value="tori">鳥用品</option>
            <option value="syou">小動物用品</option>
            <option value="bug">昆虫用品</option>
        </select><br><br>

        <label for="product_description">商品説明:</label>
        <textarea id="product_description" name="product_description" rows="4" cols="50" required></textarea><br><br>

        <button type="submit" class="bottom-right">登録</button>
    </form>

    <form action=".php" method="post" class="bottom-left">
        <button type="submit" name="back" value="true" class="pink-button">戻る</button>
    </form>
</body>

</html>