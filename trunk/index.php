<?php
//sending headers fon nocache
header("Cache-control: no-cache");
header("Expires:".gmdate("D, d M Y H:i:s")." GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");

//nastavenie ciest
require_once ("include_path.php");
require_once ("config.php");
//require_once ("Var_Dump.php");
require_once ("base.db_init.php");
require_once ("base.smarty_init.php");
require_once ("base.smarty_modules.php");
require_once ("base.auth_init.php");
require_once ("base.thulit.php");
require_once ("FCKeditor/fckeditor.php") ;
//require_once ("phpOpenTracker.php") ;
if (isSet($_GET['lang'])){$thulit['lang']=$_GET['lang'];}
if (isSet($_GET['action']) && $_GET['action'] == "logout" && $a->checkAuth()) {
    $a->logout();
    $a->start();
}
$user=get_user();
$smarty->assign('_user',$user);
//var_dump($_POST);
//echo $_GET['site'];
if (isSet($_POST['edit'])){
    save_edit();
}
$thulit['site']=$_SERVER["HTTP_HOST"];
if (IsSet($_GET["lang"])){$thulit['lang']=$_GET["lang"];}
if (IsSet($_GET["page"])){$thulit['page']=$_GET["page"];}

display_site($thulit['site'], null);
//display_root($_GET['page'],null);
//echo $_GET['edit'];



//initialization of page time counter
//$timer_start=Time()+SubStr(MicroTime(),0,8);
// log access
//phpOpenTracker::log();
//echo "\n\n\n\n\n\n<br /><br /><br /><br /><br /><br /><a href='admin.php'>admin</a>";

//echo page creation time
//echo "<div id='time_value'><br /><br />".SubStr((Time()+SubStr(MicroTime(),0,8)-$timer_start),0,7)."<br /></div>";
?>
