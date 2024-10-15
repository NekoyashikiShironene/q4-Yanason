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
        <script>
            function confirmDelete(pname, pid) {
                var ans = confirm("Delete " + pname + "?"); 
                if (ans==true)
                    document.location = "php/delete-product.php?pid=" + pid;
            }
        </script>
    </head>

    <body>
        <?php include "components/navbar.php" ?>
        <?php include "components/menu.php" ?>

        <main>
            <h1>Manage Products</h1>

            <form action="" class="search-form">
                <label for="">What are you looking for?</label> <br>
                <input type="text" class="search-bar" name="keyword">
                <button type="submit" class="search-btn">Search</button>
            </form>

            <a href="add-product.php">Add New Product</a>

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
                            <img src='images/product_photo/<?=$row["pid"]?>.jpg' width='100'><br>
                        <?=$row ["pname"]?><br><?=$row ["price"]?> บาท<br>	
                        คงเหลือ <?=$row ["remain"]?> ชิ้น<br>	

                        <a href="edit-product.php?pid=<?=$row['pid']?>">แก้ไข</a>
                        <a href="#" onclick="confirmDelete('<?=$row['pname'] ?>', <?=$row['pid'] ?>)">ลบ</a>
                    </div>
                <?php endwhile ?>

            </div>
            
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>