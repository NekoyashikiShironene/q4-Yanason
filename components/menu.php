<?php session_start(); ?>

<div class="mobile-menu">
    <button onclick="toggleBurger()" class="burger-exit">
        &#215;
    </button>
    <ul>
        <li class="link"><a href=".">Home</a></li>
        <li><a href="products.php">Products</a></li>

        <?php if ($_SESSION["role"] === "admin") : ?>
            <li><a href="product-manager.php">Manage Products</a></li>
            <li><a href="users.php">Manage Users</a></li>
        <?php endif ?>

        <?php if (!empty($_SESSION["username"])) : ?>
                <li><a href="order.php">Orders</a></li>
        <?php endif ?>

        <li>
            Pages (Workshops/Labs)
            <ul class="sublist">
                <li><a href="lab7.php">Lab 7</a></li>
                <li><a href="ws1.php" class="link">Workshop 1</a></li>
                <li><a href="ws2.php" class="link">Workshop 2</a></li>
                <li><a href="ws3.php" class="link">Workshop 3</a></li>
                <li><a href="ws4.php" class="link">Workshop 4</a></li>
                <li><a href="ws5.php" class="link">Workshop 5</a></li>
                <li><a href="ws6.php" class="link">Workshop 6</a></li>
                <li><a href="ws7.php" class="link">Workshop 7</a></li>
                <li><a href="ws8.php" class="link">Workshop 8</a></li>
                <li><a href="ws9.php" class="link">Workshop 9</a></li>
            </ul>
        </li>

        <?php if (!empty($_SESSION["username"])) : ?>
                <li><a href="user-home.php" style="display:flex; align-items:center; gap: 5px; color:black">
                    <img src="images/member_photo/<?=$_SESSION["username"]?>.jpg" width="40" height="40" style="border-radius: 100%;">
                    <?=$_SESSION["username"]?>
                </a></li>
        <?php endif ?>

    </ul>
    
</div>

<div class="close-space" onclick="toggleBurger()"></div>
