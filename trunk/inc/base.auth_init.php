<?php
require_once ("Auth.php");
function loginFunction()
{
    /**
     * Change the HTML output so that it fits to your
     * application.
     */
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
    echo "<input type=\"text\" name=\"username\">";
    echo "<input type=\"password\" name=\"password\">";
    echo "<input type=\"submit\">";
    echo "</form>";
}
//$dsnauth='mysql://red.jay.cz:redred@mysql/red_jay_cz';
$dsnauth='mysql://:@localhost/redakcia';
//$dsnauth = "mysql://user:password@localhost/database";
$a = new Auth("DB", $dsnauth, "loginFunction");

$a->start();

?>
