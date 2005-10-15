<?php
error_reporting( E_ALL );
@ini_set( "display_errors", true );
$dsnauth='mysql://root:@localhost/redakcia';
$dsn='mysql://root:@localhost/redakcia';
$modules        = array();
array_push($modules, "menu");
array_push($modules, "page");
array_push($modules, "content");
array_push($modules, "value");
array_push($modules, "property");
array_push($modules, "template");

$relation_types = array();
array_push($relation_types, "display");
array_push($relation_types, "property");
array_push($relation_types, "link");
array_push($relation_types, "body");
array_push($relation_types, "edit");
array_push($relation_types, "page");

$thulit['default_index_page']   = "index";
$thulit['modules_path']   = "modules/";
$thulit['modules_prefix'] = "module.";
$thulit['default_lang'] = "en";
$thulit['use_mod_rewrite'] = true;
$thulit['base_path'] = "/";

?>
