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
            <h1>Workshop 1</h1>
            <?php
                $stmt = $pdo->prepare("SELECT * FROM product");
                $stmt->execute();

                echo "<table border='1' class='center'><tr><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>รายละเอียด</th><th>ราคา </th></tr>";
                while ($row = $stmt->fetch()) {
                    echo "<tr><th>" . 
                        $row ["pid"] . "</th><th>" .
                        $row ["pname"] ."</th><th>" . 
                        $row ["pdetail"] . "</th><th>" . 
                        $row ["price"] . "</th></tr>";
                }
                echo "</table>"
            ?>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>