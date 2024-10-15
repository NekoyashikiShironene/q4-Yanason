<?php include "php/connect.php" ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="../script/page.js"></script>
    </head>

    <body>
        <main>
        <?php
          include "connect.php";
          session_start();
          $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
          $stmt->bindParam(1, $_POST["username"]);
          $stmt->bindParam(2, $_POST["password"]);
          $stmt->execute();
          $row = $stmt->fetch();

          if (!empty($row)) { 
            $_SESSION["fullname"] = $row["name"];   
            $_SESSION["username"] = $row["username"];

            $_SESSION["role"] = ($row["username"] === "admin") ? "admin" : "user";

            echo "<h1 style='color:green'>'เข้าสู่ระบบสำเร็จ'</h1>";
            echo "<a href='../user-home.php'>ไปที่หน้าหลัก</a>";
          } else {
            echo "<h1 style='color:red'>ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง</h1>";
            echo "<a href='../login-form.php'>ไปที่หน้าหลัก</a>";
          }
        ?>
        </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>