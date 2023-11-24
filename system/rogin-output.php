<?php
session_start(); // セッションの開始
 
$servername = "mysql216.phy.lolipop.lan";
$username = "LAA1517370";
$password = "asou2023";
$dbname = "LAA1517370-petgoods3150";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_name = $_POST['account_name'];
    $input_password = $_POST['password'];
 
    $stmt = $conn->prepare("SELECT customer_id, password FROM Customer WHERE account_name=?");
    $stmt->bind_param("s", $account_name);
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
 
        // 入力されたパスワードをハッシュ化
        $input_password_hashed = password_hash($input_password, PASSWORD_DEFAULT);
 
        // ハッシュ値を比較
        if (password_verify($input_password, $stored_password)) {
            echo "ログイン成功！";
            $_SESSION['user_id'] = $row['id'];
        } else {
            echo "ログイン失敗！ユーザー名またはパスワードが正しくありません。";
        }
    } else {
        echo "ログイン失敗！ユーザー名またはパスワードが正しくありません。";
    }
}
 
$conn->close();
?>


+++