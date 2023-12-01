<?php
session_id($_POST['session_id']);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    if ($quantity <= 0) {
        unset($_SESSION['Shohin'][$id]); // 数量が0以下の場合は商品を削除
    } else {
        $_SESSION['Shohin'][$id]['count'] = $quantity; // 数量を更新
    }
}