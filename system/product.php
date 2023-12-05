<?php
session_start();
$css = 'product.css';
require 'header.php';
require 'menu.php';
require 'menu2.php';
require 'db-connect.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">


<ul class="product">
    <div class="columns is-multiline">
        <?php
    $pdo = new PDO($connect, USER, PASS);

    if (isset($_GET['id'])) {
        $sql = $pdo->prepare('SELECT * FROM Shohin WHERE genre_id = ?');
        $sql->execute([$_GET['id']]);
    } elseif (isset($_POST['keyword'])) {
        $sql = $pdo->prepare('SELECT * FROM Shohin WHERE shohin_name LIKE ?');
        $sql->execute(['%' . $_POST['keyword'] . '%']);
    } else {
        $sql = $pdo->query('SELECT * FROM Shohin');
    }
    foreach ($sql as $row) {
        $id = $row['shohin_id'];
        $name = $row['shohin_name'];
        $stock = $row['stock'];
        ?>
        <div class="column is-one-quarter">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <a href="detail.php?id=<?= $id ?>"><img src="image/products/<?= $id ?>/top.jpg"
                                alt="<?= $name ?>"></a>
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <p style="color: <?= $stock <= 0 ? 'red' : 'black' ?>;"><?= $name ?></p>
                        <?php if ($stock <= 0) : ?>
                        <p style="color: red;">SOLD OUT</p>
                        <?php else: ?>
                        <p style="color: black;"></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</ul>

<form action="top.php">
    <input class="return-to-top" type="submit" value="戻る">
</form>

<?php require 'footer.php'; ?>