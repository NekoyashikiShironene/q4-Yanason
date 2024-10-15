<html>
<body>
<?php
$lang = $_GET["language"];
setcookie("lang", $lang, time() + 100);
?>
</body>
</html>