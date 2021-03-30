<?php
session_start();
    $header= <<<TRUC
<!DOCTYPE html>
<html>

<head>
    <title>Mon premier site en PHP</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
</body>

</html>
TRUC;
$bandeau = "<div id=\"bandeau\">Me voila!</div>";
//$menu = "<a href=\"page1.php\">Page 1</a> | <a href=\"page2.php\">Page 2</a>";
echo $header.$bandeau;
session_destroy();
?>