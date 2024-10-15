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
            <h1>Workshop 2</h1>
            <?php
                $stmt = $pdo->prepare("SELECT name, address, email FROM member");
                $stmt->execute();
                while ($row = $stmt->fetch()):
            ?>
                ชื่อ:  <?=$row["name"]?> <br>
                ที่อยู่: <?=$row["address"]?> <br> 
                อีเมล:  <?=$row["email"]?> <hr> 
            <?php endwhile; ?>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>