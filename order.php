<?php 
    include "php/connect.php";
    session_start();

    if ($_SESSION["role"] === "admin") {
        $query = "SELECT orders.ord_id, member.username, 
                         orders.ord_date, 
                         SUM(product.price * item.quantity) AS total, 
                         orders.status 
                  FROM member 
                  JOIN orders ON member.username = orders.username 
                  JOIN item ON orders.ord_id = item.ord_id 
                  JOIN product ON item.pid = product.pid ";
        
        if (!empty($_GET["username"])) {
            $query .= "WHERE member.username = :username ";
        }

        $query .= "GROUP BY orders.ord_id 
                   ORDER BY orders.ord_date";

        $stmt = $pdo->prepare($query);

        if (!empty($_GET["username"])) {
            $stmt->bindParam(':username', $_GET["username"], PDO::PARAM_STR);
        }

    } else {
        $query = "SELECT orders.ord_id, member.username, 
                         orders.ord_date, 
                         SUM(product.price * item.quantity) AS total, 
                         orders.status 
                  FROM member 
                  JOIN orders ON member.username = orders.username 
                  JOIN item ON orders.ord_id = item.ord_id 
                  JOIN product ON item.pid = product.pid 
                  WHERE member.username = :session_username 
                  GROUP BY orders.ord_id 
                  ORDER BY orders.ord_date";
                  
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':session_username', $_SESSION["username"], PDO::PARAM_STR);
    }

    $stmt->execute();
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="script/page.js"></script>
    </head>

    <body>
        <?php include "components/navbar.php"; ?>
        <?php include "components/menu.php" ?>
        <main>
            <h1>Order</h1>
            
            <table border="1">
                <tr>
                    <th style="padding: 2px;">Order ID</th>
                    <th style="padding: 2px;">Username</th>
                    <th style="padding: 2px;">Date</th>
                    <th style="padding: 2px;">Products</th>
                    <th style="padding: 2px;">Total</th>
                    <th style="padding: 2px;">Status</th>
                </tr>
                <?php while ($row = $stmt->fetch()) : ?>
                    <tr>
                        <td style="padding: 2px;"><?=$row["ord_id"]?></td>
                        <td style="padding: 2px;"><?=$row["username"]?></td>
                        <td style="padding: 2px;"><?=$row["ord_date"]?></td>
                        <td style="padding: 2px;">
                            <ul>
                                <?php 
                                    $stmt2 = $pdo->prepare("SELECT o.ord_id, p.pid, 
                                    p.pname, p.pdetail, p.price, i.quantity  
                                    FROM orders o 
                                    JOIN item i ON o.ord_id = i.ord_id 
                                    JOIN product p ON i.pid = p.pid 
                                    WHERE o.username = ? 
                                    AND o.ord_id = ?");

                                    $stmt2->bindParam(1, $row["username"]);
                                    $stmt2->bindParam(2, $row["ord_id"]);
                                    $stmt2->execute();

                                    while ($prow = $stmt2->fetch()) :
                                ?>
                                    <li><?=$prow["pname"] ?> (&times;<?=$prow["quantity"] ?>)</li>
                                <?php endwhile ?>
                            </ul>
                        </td>
                        <td style="padding: 2px;"><?=$row["total"]?> บาท</td>
                        <td style="padding: 2px;"><?=$row["status"]?></td>
                    </tr> 
                <?php endwhile ?>
            </table>
        </main>
        <?php include "components/footer.php"; ?>
    </body>
</html>