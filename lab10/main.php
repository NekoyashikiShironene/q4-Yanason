<html>
<body>
<?php
switch ($_COOKIE["lang"]) {
    case "th":
        echo "ยินดีต้อนรับ";
        break;
    case "en":
        echo "Welcome";
        break;
    case "jp":
        echo "いらっしゃいませ";
        break;
    default:
        echo "Welcome";

}
?>
</body>
</html>