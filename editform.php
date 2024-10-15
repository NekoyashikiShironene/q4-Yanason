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
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
            $stmt->bindParam(1, $_GET["username"]);
            $stmt->execute(); 
            $row = $stmt->fetch();
        ?>
        <main>
            <h1>Edit User</h1>
            <img src="images/member_photo/<?=$row["username"].".jpg"?>" width="300">
            <form action="edit.php" method="post" enctype="multipart/form-data">
                Username : <input type="text" name="username" value=<?=$row["username"]?> readonly><br>
                ชื่อ: <input type="text" name="name" value=<?=$row["name"]?>><br>
                ที่อยู่: <br>
                <textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
                อีเมล: <input type="email" name="email" value=<?=$row["email"]?>><br>
                โทรศัพท์: <input type="text" name="mobile" value=<?=$row["mobile"]?>><br>
                รูปภาพ: <input type="file" name="image"><br>
                <input type="submit" value="แก้ไขผู้ใช้">
            </form>
            </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>