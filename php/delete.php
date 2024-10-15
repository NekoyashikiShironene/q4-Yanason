<?php 
    include "connect.php";
    $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
    $stmt->bindParam(1, $_GET["username"]); 
    if ($stmt->execute()) {
        unlink("../images/member_photo/" . $_GET["username"] . ".jpg");
        header("location: ../ws6.php");
    }
        
?>