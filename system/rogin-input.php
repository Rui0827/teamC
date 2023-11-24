<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>ログイン</h1>
    <form action="rogin-output.php" method="post">
        <div>
            ログイン名：<input type="text" name="account_name" required><br><br><br>
        </div>
        <div>
            パスワード：<input type="password" name="password" required><br><br><br><br>
            <br><br>
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
    <form action="rogin-output.php" method="post">
        <button type="submit" name="new_registration" value="true">新規登録</button>
        <button type="submit" name="update" value="true">更新</button>
        <button type="submit" name="back" value="true">戻る</button>
    </form>
</body>

</html>