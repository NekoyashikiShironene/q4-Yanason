<?php session_start(); ?>
<nav>
    <div class="nav-container"> 
        <div class="nav-subcontainer">
            <div class="burger" onclick="toggleBurger()">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p>CS PHARMACY</p>

            
        </div>  

        <ul class="menu">
            <li><a href=".">Home</a></li>
            <li><a href="/~csb6563095/csshop/products.php">Products</a></li>

            <?php if ($_SESSION["role"] === "admin") : ?>
                <li><a href="/~csb6563095/csshop/product-manager.php">Manage Products</a></li>
                <li><a href="/~csb6563095/csshop/users.php">Manage Users</a></li>
            <?php endif ?>

            <?php if (!empty($_SESSION["username"])) : ?>
                <li><a href="/~csb6563095/csshop/order.php">Orders</a></li>
            <?php endif ?>
            
            <li>
                <div class="dropdown">
                    <button class="dropdown-btn">Pages</button>
                    <ul class="dropdown-content">
                        <li><a href="/~csb6563095/csshop/lab7.php">Lab 7</a></li>
                        <li><a href="/~csb6563095/csshop/ws1.php">Workshop 1</a></li>
                        <li><a href="/~csb6563095/csshop/ws2.php">Workshop 2</a></li>
                        <li><a href="/~csb6563095/csshop/ws3.php">Workshop 3</a></li>
                        <li><a href="/~csb6563095/csshop/ws4.php">Workshop 4</a></li>
                        <li><a href="/~csb6563095/csshop/ws5.php">Workshop 5</a></li>
                        <li><a href="/~csb6563095/csshop/ws6.php">Workshop 6</a></li>
                        <li><a href="/~csb6563095/csshop/ws7.php">Workshop 7</a></li>
                        <li><a href="/~csb6563095/csshop/ws8.php">Workshop 8</a></li>
                        <li><a href="/~csb6563095/csshop/ws9.php">Workshop 9</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <div class="dropdown">
                    <button class="dropdown-btn">Ajax/Json</button>
                    <ul class="dropdown-content">
                        <li><a href="/~csb6563095/csshop/ajax-json/no1.php">No. 1</a></li>
                        <li><a href="/~csb6563095/csshop/ajax-json/no2.php">No. 2</a></li>
                        <li><a href="/~csb6563095/csshop/ajax-json/no3.php">No. 3</a></li>
                    </ul>
                </div>
            </li>

            <?php if (!empty($_SESSION["username"])) : ?>
                <li><a href="user-home.php" style="display:flex; align-items:center; gap: 5px; color:black">
                    <img src="/~csb6563095/csshop/images/member_photo/<?=$_SESSION["username"]?>.jpg" width="50" height="50" style="border-radius: 100%;">
                    <?=$_SESSION["username"]?>
                </a></li>
            <?php endif ?>
            
        </ul>

        <?php if (empty($_SESSION["username"])) : ?>
            <div class="login-btn" style="color:white;">
                <a href="/~csb6563095/csshop/login-form.php">Login</a>
            </div>
        <?php else : ?>
            <div class="login-btn" style="color:white;">
                <a href="/~csb6563095/csshop/logout.php">Logout</a>
            </div>
        <?php endif ?>
        
        
    </div>

</nav>