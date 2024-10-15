<?php include "php/connect.php" ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="script/page.js"></script>
    </head>

    <body>
        <?php include "components/navbar.php"; ?>
        <?php include "components/menu.php" ?>
        <main>
            <h1>Workshop 4</h1>

            <form action="" class="search-form">
                <label for="">What are you looking for?</label> <br>
                <input type="text" class="search-bar" name="keyword">
                <button type="submit" class="search-btn">Search</button>
            </form>

            <?php
                $stmt = $pdo->prepare("SELECT username, name, address, email FROM member WHERE name LIKE ?");
                if (!empty($_GET)) 
                    $value = '%' . $_GET["keyword"] . '%';

                $stmt->bindParam(1, $value); 
                $stmt->execute();
            ?>
            <?php while ($row = $stmt->fetch()) : ?>
                ชื่อ: <?=$row["name"]?> <br>
                ที่อยู่: <?=$row["address"]?> <br>
                อีเมล: <?=$row["email"]?> <br>
                <img src='images/member_photo/<?=$row["username"]?>.jpg' width=100 > <br>
                <hr>
            <?php endwhile; ?>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>