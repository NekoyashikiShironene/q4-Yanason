<?php
    try {
        $pdo = new PDO("mysql:host=localhost; dbname=sec1_24; charset=utf8", "Wstd24", "cAYqAqaE");
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด : " . $e->getMessage();
    }
?>