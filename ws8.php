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
            <h1>Workshop 8</h1>
            <form action="php/insert-redirect.php" method="post" enctype="multipart/form-data">
                Username : <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
                ชื่อ: <input type="text" name="name"><br>
                ที่อยู่: <br>
                <textarea name="address" rows="3" cols="40"></textarea><br>
                อีเมล: <input type="email" name="email"><br>
                โทรศัพท์: <input type="text" name="mobile"><br>
                รูปภาพ: <input type="file" name="image"><br>
                <input type="submit" value="เพิ่มผู้ใช้">
            </form>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>