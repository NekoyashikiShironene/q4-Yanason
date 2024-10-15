<?php include "connect.php";

$target_dir = "../images/member_photo/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    $username = $_POST["username"];
    $image_name = $username . ".jpg";
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $_POST["password"]);
        $stmt->bindParam(3, $_POST["name"]);
        $stmt->bindParam(4, $_POST["address"]);
        $stmt->bindParam(5, $_POST["mobile"]);
        $stmt->bindParam(6, $_POST["email"]);

        $stmt->execute();

        echo "<html><head><meta charset='UTF-8'></head><body>";
        echo "เพิ่มผู้ใช้สำเร็จ ผู้ใช้คือ $username";
        echo "</body></html>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "File is not an image.";
}

?>