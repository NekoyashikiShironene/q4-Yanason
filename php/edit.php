<?php include "connect.php" ?>

<?php
    $username = $_POST["username"];
    if (isset($_FILES["image"]) && $_FILES["image"]["size"] > 0) {
        $target_dir = "../images/member_photo/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);

        if ($check !== false) {
            $image_name = $username . ".jpg";
            $target_file = $target_dir . $image_name;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);  
        }
        
    }
    

    $stmt = $pdo->prepare("UPDATE member SET name=?, address=?, email=?, mobile=? WHERE username=?"); 
    $stmt->bindParam(1, $_POST["name"]); 
    $stmt->bindParam(2, $_POST["address"]);
    $stmt->bindParam(3, $_POST["email"]);
    $stmt->bindParam(4, $_POST["mobile"]);
    $stmt->bindParam(5, $username);

    if ($stmt->execute())
        header("location: ../member-detail.php?username=" . $username);
?>