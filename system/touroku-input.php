<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <link rel="stylesheet" href="css/touroku-input.css">
</head>

<body>
    <h1>商品登録</h1>
    <form action="touroku-output.php" method="post" enctype="multipart/form-data">
        <label for="shohin_name">商品名:</label>
        <input type="text" id="shohin_name" name="shohin_name" required><br><br>

        <label for="price">価格:</label>
        <input type="number" id="price" name="price" required min="0"><br><br>

        <label for="stock">在庫数:</label>
        <input type="number" id="stock" name="stock" required min="0"><br><br>

        <label for="photo">商品画像:</label>
        <input type="file" id="photo" name="photo" required accept="/system/image/*"><br><br>

        <label for="genre_id">ジャンル:</label>
        <select id="genre_id" name="genre_id" required>
            <option value="" disabled selected>ジャンルを選択してください</option>
            <option value="1">犬用品</option>
            <option value="2">猫用品</option>
            <option value="3">爬虫類</option>
            <option value="4">魚用品</option>
            <option value="5">鳥用品</option>
            <option value="6">小動物用品</option>
            <option value="7">昆虫用品</option>
        </select><br><br>

        <label for="details">商品説明:</label>
        <textarea id="details" name="details" rows="4" cols="50" required></textarea><br><br>

        <button type="submit" class="bottom-right">登録</button>
    </form>

    <form action="kanrisya_itiran.php" method="post" class="bottom-left">
        <button type="submit" name="back" value="true" class="pink-button">戻る</button>
    </form>
</body>

</html>