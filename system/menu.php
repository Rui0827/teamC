<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
<div class="menu">
    <span class="top">
        <a href="top.php">
            <img src="image/system/rogo.png" alt="image" width="100">
        </a>
    </span>

    <span class="kensaku">
        <form action="product.php" method="post">
            <input type="text" size="80" name="keyword">
            <input class="kensaku-btn" type="submit" value="検索">
        </form>
    </span>

    <?php
$userLoggedIn = isset($_SESSION['Customer']);

echo '<div class="menu">';
if ($userLoggedIn) {
    echo '<a href="logout.php">';
    echo '<img width="50" src="image/system/logout.png" alt="ログアウト">';
    echo '</a>';
    echo '<a href="cart-show.php">';
    echo '<img width="70" src="image/system/cart.png" alt="カート">';
    echo '</a>';
    echo '<form action="kosin-input.php" method="post">';
    echo ' <button class="button is-danger" type="submit">更新</button>';
    echo '</form>';
} else {
    echo '<a href="login.php">';
    echo '<img width="70" src="image/system/rogin.png" alt="ログイン">';
    echo '</a>';
    echo '<a href="cart-show.php">';
    echo '<img width="70" src="image/system/cart.png" alt="カート">';
    echo '</a>';
    echo '<form action="usertoroku.php" method="post">';
    echo '<button class="button is-danger" type="submit">新規登録</button>';
    echo '</form>';
}
echo '</div>';
?>
    <hr>
</div>
<hr>