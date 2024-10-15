<?php include "php/connect.php" ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="script/page.js"></script>
        <script>
            function confirmDelete(username) {
                var ans = confirm("Delete " + username + "?"); 
                if (ans==true)
                    document.location = "php/delete.php?username=" + username;
            }
        </script>
    </head>

    <body>
        <?php include "components/navbar.php"; ?>
        <?php include "components/menu.php" ?>
        <main>
            <h1>Manage Users</h1>
            <?php
                $stmt = $pdo->prepare("SELECT * FROM member");
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<img src='images/member_photo/" . $row ["username"] . "' width='100'> <br>";
                    echo "ชื่อ : " . $row ["name"] . "<br>";
                    echo "ที่อยู่ : " . $row ["address"] . "<br>";
                    echo "อีเมล : " . $row ["email"] . "<br>";
                    echo "โทร : " . $row ["mobile"] . "<br>";
                    echo "<a href='order.php?username="  . $row ["username"] . "'>ดูออเดอร์</a> ";
                    echo "<a href='editform.php?username=" . $row ["username"] . "'>แก้ไข</a>   ";
                    echo "<a href='#' onclick='confirmDelete(\"" . $row ["username"] . "\")'>ลบ</a>  ";
                    echo "<hr>\n";
                }
            ?>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>