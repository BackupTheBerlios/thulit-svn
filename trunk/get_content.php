<?php
//sending headers fon nocache
header("Cache-control: no-cache");
header("Expires:".gmdate("D, d M Y H:i:s")." GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");

//nastavenie ciest
require_once ("include_path.php");
require_once ("Var_Dump.php");
require_once ("base.db_init.php");
require_once ("base.smarty_init.php");
require_once ("class.display_content.php");
require_once ("class.display_menu.php");
require_once ("FCKeditor/fckeditor.php") ;

$smarty->display('content_begin.tpl');

$display_content=new DISPLAY_CONTENT($page);
$display_content->vypis();

$smarty->display('content_end.tpl');

?>