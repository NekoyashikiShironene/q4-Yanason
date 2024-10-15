<?php
    include "../php/connect.php";
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
    $row = $stmt->fetch();

    sleep(1);
    if ( empty($row) ) {
    echo "okay";
    } else {
    echo "denied";
    }
?>