<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/usertoroku.css">
    <title>ユーザー登録</title>
</head>

<body>

    <div class="login-page">
        <div class="nyuryoku">
            <header>
                <h1>ユーザー登録</h1>
            </header>
            <form action="usertorokukakunin.php" method="post">
                <input type="text" name="account_name" id="account_name" placeholder="アカウント名">
                </br>
                <input type="password" name="password" id="password" placeholder="パスワード">
                </br>
                <input type="text" name="address" id="address" placeholder="住所">
                </br>
                <input type="text" name="Email" id="Email" placeholder="メールアドレス">
                <div class="wrapper">
                    <div class="toroku">
                        <input type="submit" value="登録">
                    </div>
            </form>
            <form action="top.php" method="post">
                <div class="back">
                    <input type="submit" value="戻る">
                </div>
            </form>


        </div>
    </div>
    </br>

    </div>
</body>

</html>