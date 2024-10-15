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
            <h1>Workshop 5</h1>
            <?php
                $stmt = $pdo->prepare("SELECT username FROM member");
                $stmt->execute();
            ?>

            <?php while ($row = $stmt->fetch()) : ?>
                Username: <?=$row["username"]?> <br>
                
                <a href='member-detail.php?username=<?=$row["username"]?>'>
                    <img src='images/member_photo/<?=$row["username"]?>.jpg' width=100 > <br>
                </a>
                <hr>
            <?php endwhile; ?>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>