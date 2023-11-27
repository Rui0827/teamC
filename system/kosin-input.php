<?php session_start(); ?>

<?php
$name=$address=$Email='';
if (isset($_SESSION['Customer'])) {
    $name=$_SESSION['Customer']['account_name'];
    $address=$_SESSION['Customer']['address'];
    $Email=$_SESSION['Customer']['Email'];
}
echo '<p>更新する情報を入力して下さい</p>';
echo '<form action="kosin-output.php" method="post">';
echo '<table>';
echo '<tr><td>お名前</td><td>';
echo '<input type="text" name="name" value="', $name, '">';
echo '</td></tr>';
echo '<tr><td>住所</td><td>'; 
echo '<input type="text" name="address" value="', $address, '">';
echo '</td></tr>';
echo '<tr><td>Eメール</td><td>'; 
echo '<input type="text" name="Email" value="', $Email, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';
?>