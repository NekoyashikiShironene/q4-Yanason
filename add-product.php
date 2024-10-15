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
            <h1>Add Product</h1>
            <form action="php/insert-product.php" method="post" enctype="multipart/form-data">
                ชื่อสินค้า: <input type="text" name="pname"><br>
                รายละเอียด: <br>
                <textarea name="pdetail" rows="3" cols="40"></textarea><br>
                ราคา: <input type="number" name="price"> <br>
                คงเหลือ: <input type="number" name="remain"> <br>
                รูปภาพ: <input type="file" name="image"><br>
                 <input type="submit" value="เพิ่มสินค้า">
            </form>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>