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
            function confirmDelete(pname, pid) {
                var ans = confirm("Delete " + pname + "?"); 
                if (ans==true)
                    document.location = "php/delete.php?pid=" + pid;
            }
        </script>
    </head>

    <body>
        <?php include "components/navbar.php"; ?>
        <?php include "components/menu.php" ?>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
            $stmt->bindParam(1, $_GET["pid"]);
            $stmt->execute(); 
            $row = $stmt->fetch();
        ?>
        <main>
            <h1>Edit Product</h1>
            <img src="images/product_photo/<?=$row["pid"].".jpg"?>" width="300">
            <form action="php/edit-product.php" method="post" enctype="multipart/form-data">
                ไอดีสินค้า: <input type="text" name="pid" value=<?=$row["pid"]?> readonly><br>
                ชื่อสินค้า: <input type="text" name="pname" value=<?=$row["pname"]?>><br>
                รายละเอียด: <br>
                <textarea name="pdetail" rows="3" cols="40"><?=$row["pdetail"]?></textarea><br>
                ราคา: <input type="number" name="price" value=<?=$row["price"]?>> บาท<br>
                จำนวนคงเหลือ: <input type="number" name="remain" value=<?=$row["remain"]?>> ชิ้น<br>
                รูปภาพ: <input type="file" name="image"><br>
                <input type="submit" value="แก้ไขสินค้า">
            </form>
            </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>