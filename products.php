<?php 
    include "php/connect.php";
    session_start();

    if(empty($_SESSION['cart']))
		$_SESSION['cart'] = array();
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
        <?php include "components/navbar.php" ?>
        <?php include "components/menu.php" ?>

        <main>
            <h1>Products</h1>
            <form action="" class="search-form">
                <label for="">What are you looking for?</label> <br>
                <input type="text" class="search-bar" name="keyword">
                <button type="submit" class="search-btn">Search</button>
            </form>

            <a href="cart.php?action=">สินค้าในตะกร้า (<?=sizeof($_SESSION['cart'])?>)</a>
            <div style="display:flex; flex-wrap: wrap">	

                <?php
                    if ($_GET["keyword"]) {
                        $stmt = $pdo->prepare("SELECT * FROM product WHERE pname LIKE ?");
                        $keyword = '%' . $_GET["keyword"] . '%';
                        $stmt->bindParam(1,$keyword);
                    }
                    else {
                        $stmt = $pdo->prepare("SELECT * FROM product");
                    }
                    $stmt->execute();
                    
                    while ($row = $stmt->fetch()) :
                ?>
                    <div style="padding: 14px; text-align: center">
                        <a href="detail.php?pid=<?=$row["pid"]?>">
                            <img src='images/product_photo/<?=$row["pid"]?>.jpg' width='100'></a><br>
                        <?=$row ["pname"]?><br><?=$row ["price"]?> บาท<br>	
                        <form method="post" action="cart.php?action=add&pid=<?=$row["pid"]?>&pname=<?=$row["pname"]?>&price=<?=$row["price"]?>">
                            <input type="number" name="qty" value="1" min=<?=min($row ["remain"], 1)?> max=<?=max($row ["remain"], 1)?>>
                            <input type="submit" value="ซื้อ">	   
                        </form>
                    </div>
                <?php endwhile ?>

            </div>
            
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>