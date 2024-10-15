<?php 
    include "php/connect.php"; 
    session_start();
?>

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
            <h1>Details</h1>
            <?php
                $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
                $stmt->bindParam(1, $_GET["pid"]);       
                $stmt->execute();
                $row = $stmt->fetch();
            ?>

            <a href="products.php">กลับ</a>
            <div style="display:flex">
            <div>
                <img src='images/product_photo/<?=$row["pid"]?>.jpg' width='200'>
            </div>
            <div style="padding: 15px">
                <h2><?=$row["pname"]?></h2>
                รายละเอียดสินค้า: <?=$row["pdetail"]?><br>
                ราคาขาย <?=$row["price"]?> บาท<br>
                <form method="post" action="cart.php?action=add&pid=<?=$row["pid"]?>&pname=<?=$row["pname"]?>&price=<?=$row["price"]?>">
                    <input type="number" name="qty" value="1" min="1" max="9">
                    <input type="submit" value="ซื้อ">	   
                </form>
            </div>
            
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>
