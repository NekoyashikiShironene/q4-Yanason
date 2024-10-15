<?php 
    include "connect.php";

    $stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price, remain) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["pname"]);
    $stmt->bindParam(2, $_POST["pdetail"]);
    $stmt->bindParam(3, $_POST["price"]);
    $stmt->bindParam(4, $_POST["remain"]);
    $stmt->execute();

    $pid = $pdo->lastInsertId();

    $target_dir = "../images/product_photo/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);

    if ($check !== false) {
        $image_name = $pid . ".jpg";
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        header("location: ../product-manager.php");

    } else {
        echo "File is not an image.";
    }
?>