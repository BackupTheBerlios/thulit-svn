<?php

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

$thulit['default_page']   = "index";
$thulit['modules_path']   = "modules/";
$thulit['modules_prefix'] = "module.";
$thulit['default_lang'] = "en";
?>
