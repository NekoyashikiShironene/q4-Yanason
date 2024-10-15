<?php 
    include "connect.php";
    $stmt = $pdo->prepare("DELETE FROM product WHERE pid=?");
    $stmt->bindParam(1, $_GET["pid"]); 
    if ($stmt->execute()) {
        unlink("../images/product_photo/" . $_GET["pid"] . ".jpg");
        header("location: ../product-manager.php");
    } 
?>