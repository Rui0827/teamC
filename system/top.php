<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>システム開発</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.slider').bxSlider({
            auto: true,
            pause: 5000,
        });
    });
    </script>

</head>

<body>

    <?php require 'menu.php'; ?>
    <?php require 'menu2.php'; ?>

    <div class="slider">
        <img src="image/top/cat2.jpg" width="100" height="300" alt="">
        <img src="image/top/dog2.jpg" width="100" height="300" alt="">
        <img src="image/top/goods1.jpg" width="100" height="300" alt="">
    </div>

    <?php require 'footer.php'; ?>