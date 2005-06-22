<?php
//main database class initialization
require_once ("DB.php");
//$dsn='mysql://red.jay.cz:redred@mysql/red_jay_cz';
$dsn='mysql://jay:jay@localhost/redakcia';
$db =& DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
$db->setFetchMode(DB_FETCHMODE_ASSOC);
if (DB::isError($db)) {
    die($db->getMessage());
}
?>
