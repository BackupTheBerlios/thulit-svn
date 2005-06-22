<?php
//sending headers fon nocache
header("Cache-control: no-cache");
header("Expires:".gmdate("D, d M Y H:i:s")." GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");


//nastavenie ciest
require_once ("include_path.php");
require_once ("config.php");
require_once ("Var_Dump.php");
require_once ("base.db_init.php");
require_once ("base.smarty_init.php");
require_once ("base.thulit.php");
//require_once ("phpOpenTracker.php") ;

//initialization of page time counter
$timer_start=Time()+SubStr(MicroTime(),0,8);
// log access
//phpOpenTracker::log();

display_root($_GET['page']);




echo "\n\n\n\n\n\n<br /><br /><br /><br /><br /><br /><a href='admin.php'>admin</a>";

//echo page creation time
echo "<div id='time_value'><br /><br />".SubStr((Time()+SubStr(MicroTime(),0,8)-$timer_start),0,7)."<br /></div>";
?>
