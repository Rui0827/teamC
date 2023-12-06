<div style="text-algin:center">
    <link rel="stylesheet" href="css/menu2.css">
    <nav>
        <ul>
            <?php
            $menuItems = array(
                'top.php' => 'TOP',
                'product.php?id=1' => '犬用品',
                'product.php?id=2' => '猫用品',
                'product.php?id=3' => '爬虫類',
                'product.php?id=4' => '魚用品',
                'product.php?id=5' => '鳥用品',
                'product.php?id=6' => '小動物用品',
                'product.php?id=7' => '昆虫用品'
            );

            foreach ($menuItems as $url => $label) {
                $basename = '/kaihatu/';
                $currentUri = str_replace($basename, '', $_SERVER['REQUEST_URI']);

                $class = ($currentUri == $url) ? 'class="current"' : '';
                echo "<li $class><a href=\"$url\">$label</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>
<br>