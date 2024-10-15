<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>CS Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
        <script src="../script/page.js"></script>
        <script>
            var xmlHttp;
            function searchMember() {
                xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = showUsernameStatus;

                var username = document.getElementById("username").value;
                var url = "searchMember.php?keyword=" + username;
                xmlHttp.open("GET", url);
                xmlHttp.send();
            }
            function showUsernameStatus() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById("result").innerHTML = xmlHttp.responseText;
                }

            }
        </script>
    </head>

    <body>
        <?php include "../components/navbar.php"; ?>
        <?php include "../components/menu.php" ?>
        <main>
            <h1>Search Member</h1>

            <form action="" class="search-form">
                <label for="">What are you looking for?</label> <br>
                <input type="text" class="search-bar" name="keyword" id="username" onkeyup="searchMember()">
            </form>

            <div id="result">
                
            </div>
        </main>
        <?php include "../components/footer.php"; ?>
    </body>
</html>