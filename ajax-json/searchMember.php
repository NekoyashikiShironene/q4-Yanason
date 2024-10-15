<?php 
    include "../php/connect.php";
    $stmt = $pdo->prepare("SELECT username, name, address, email FROM member WHERE name LIKE ?");
    if (!empty($_GET)) 
        $value = '%' . $_GET["keyword"] . '%';

    $stmt->bindParam(1, $value); 
    $stmt->execute();
    
    while ($row = $stmt->fetch()) : ?>
        ชื่อ: <?=$row["name"]?> <br>
        ที่อยู่: <?=$row["address"]?> <br>
        อีเมล: <?=$row["email"]?> <br>
        <img src='../images/member_photo/<?=$row["username"]?>.jpg' width=100 > <br>
        <hr>

<?php endwhile; ?>