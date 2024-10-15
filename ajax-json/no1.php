<?php include "../php/connect.php" ?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="../script/page.js"></script>

        <style>
            .thinking {
                background: white url("img/checking.gif") no-repeat;
                background-position: 150px 1px;
            }

            .approved {
                background: white url("img/true.gif") no-repeat;
                background-position: 150px 1px;
            }

            .denied {
                background: #FF8282 url("img/false.gif") no-repeat;
                background-position: 150px 1px;
            }
        </style>

        <script>
            var xmlHttp;
            function checkUsername() {
                document.getElementById("username").className = "thinking";
                xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = showUsernameStatus;
                var username = document.getElementById("username").value;
                var url = "checkName.php?username=" + username;
                xmlHttp.open("GET", url);
                xmlHttp.send();
            }
            function showUsernameStatus() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    if (xmlHttp.responseText == "okay") {
                        document.getElementById("username").className = "approved";
                    } else {
                        document.getElementById("username").className = "denied";
                        document.getElementById("username").focus();
                        document.getElementById("username").select();
                    }
                }
            }
        </script>
    </head>

    <body>
        <?php include "../components/navbar.php"; ?>
        <?php include "../components/menu.php" ?>
        <main>
            <h1>Please register:</h1>
            <form>
                Username:<input id="username" type="text" onblur="checkUsername()"><br>
                First Name:<input type="text" name="firstname"><br>
                LastName:<input type="text" name="lastname"><br>
                Email:<input type="text" name="email"><br>
                <input type="submit" value="Register">
            </form>
        </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>