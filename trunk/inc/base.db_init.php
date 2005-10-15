<?php
//main database class initialization
require_once ("DB.php");
$db =& DB::connect($dsn);
if (DB::isError($db)) {
    die($db->getMessage());
}
$db->setFetchMode(DB_FETCHMODE_ASSOC);
if (DB::isError($db)) {
    die($db->getMessage());
}
$q="SET CHARACTER SET utf8";
$set = $db->query($q);
if (DB::isError($set)) {    die($set->getMessage());}
$q="SET collation_connection = 'utf8_general_ci'";
$set = $db->query($q);
if (DB::isError($set)) {    die($set->getMessage());}

?>
