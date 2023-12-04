<?php
session_start();
$css = 'product.css';
require 'header.php';
require 'menu.php';
require 'menu2.php';
require 'db-connect.php';
?>


<ul class="product">
    <?php
      $pdo = new PDO($connect, USER, PASS);
      $sql = $pdo->query('SELECT * FROM Shohin');

      foreach ($sql as $row) {
        $id = $row['shohin_id'];
        $stock = $row['stock'];
        echo '<li class="product-cell">';
        echo '<a href="detail.php?id=', $id, '">', '<img src="image/products/', $id, '/top.jpg" width="200" height="200"></a>';
        if ($stock <= 0) {
          echo '<p>SOLD OUT</p>';
        }
        echo '</li>';
      }
      ?>
</ul>

<form action="top.php">
    <input class="return-to-top" type="submit" value="戻る">
</form>

<?php require 'footer.php'; ?>