<?php
	session_start();

	if ($_GET["action"]=="add") {

		$pid = $_GET['pid'];

		$cart_item = array(
			'pid' => $pid,
			'pname' => $_GET['pname'],
			'price' => $_GET['price'],
			'qty' => $_POST['qty']
		);

		if(empty($_SESSION['cart']))
			$_SESSION['cart'] = array();
	

		if(array_key_exists($pid, $_SESSION['cart']))
			$_SESSION['cart'][$pid]['qty'] += $_POST['qty'];
	

		else
			$_SESSION['cart'][$pid] = $cart_item;

	} else if ($_GET["action"]=="update") {
		$pid = $_GET["pid"];     
		$qty = $_GET["qty"];
		$_SESSION['cart'][$pid]['qty'] = $qty;


	} else if ($_GET["action"] == "delete") {
		$pid = $_GET['pid'];
		unset($_SESSION['cart'][$pid]);
	}
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
			// ใช้สำหรับปรับปรุงจำนวนสินค้า
			function update(pid) {
				var qty = document.getElementById(pid).value;
				// ส่งรหัสสินค้า และจำนวนไปปรับปรุงใน session
				document.location = "cart.php?action=update&pid=" + pid + "&qty=" + qty; 
			}
		</script>
    </head>

    <body>
        <?php include "components/navbar.php"; ?>
        <?php include "components/menu.php" ?>
        <main>
            <h1>Cart</h1>

			<form>
				<table border="1">
					<?php 
						$sum = 0;
						foreach ($_SESSION["cart"] as $item) {
							$sum += $item["price"] * $item["qty"];
					?>
						<tr>
							<td><?=$item["pname"]?></td>
							<td><?=$item["price"]?></td>
							<td>			
								<input type="number" id="<?=$item["pid"]?>" value="<?=$item["qty"]?>" min="1" max="9">
								<a href="#" onclick="update(<?=$item["pid"]?>)">แก้ไข</a>
								<a href="?action=delete&pid=<?=$item["pid"]?>">ลบ</a>
							</td>
						</tr>
					<?php } ?>
					<tr><td colspan="3" align="right">รวม <?=$sum?> บาท</td></tr>
				</table>
			</form>

<a href="products.php">< เลือกสินค้าต่อ</a>
            
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>