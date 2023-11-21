<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<body>
<h1>ユーザー更新</h1>
<p>新しいアカウントとパスワードを入力して下さい</p>

<link rel="stylesheet" href="css/kosin.css">
<?php
$name=$address=$login=$password='';
if (isset($_SESSION['customer'])) {
    $name=$_SESSION['customer']['name'];
    $address=$_SESSION['customer']['address'];
    $login=$_SESSION['customer']['login'];
    $password=$_SESSION['customer']['password'];
}
echo '<table>';
echo '<form action="kosin-output.php" method="post">';
echo '<tr><td>お名前</td><td>';
echo '<input type="text" name="name" value="', $name, '">';
echo '</td></tr>';
echo '<tr><td>ご住所</td><td>';
echo '<input type="text" name="address" value="', $address, '">';
echo '</td></tr>';
echo '<tr><td>ログイン名</td><td>'; 
echo '<input type="text" name="login" value="', $login, '">';
echo '</td></tr>';
echo '<tr><td>パスワード</td><td>'; 
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<div class="touroku"><input type="submit"  value="登録"></div>';
echo '</form>';
echo '<div class="logout"><form action="logout.php" method="post">';
echo '<input type="submit" value="ログアウト"></div>';
echo '</form>';
?>
</body>
<?php require 'footer.php'; ?>