<?php
define('SMARTY_DIR', '../smarty/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty;
$smarty->use_sub_dirs = false;
$smarty->template_dir = './templates/';
$smarty->compile_dir = './templates_c/';
$smarty->config_dir = './configs/';
$smarty->cache_dir = './cache/';
//if(isSet($_GET['lang'])){$smarty->assign('lang',$_GET['lang']);}
//if(isSet($_GET['site'])){$smarty->assign('site',$_GET['site']);}
//if(isSet($_GET['page'])){$smarty->assign('page',$_GET['page']);}
if(isSet($_GET['return'])){$smarty->assign('return',$_GET['return']);}
if(isSet($_GET)){$smarty->assign('get_sentence',$_GET);}
//var_dump($_GET);

function db_get_template ($tpl_name, &$tpl_source, &$smarty_obj){
    global $db;
    global $thulit;
    $set = db_get("select id from data where name_id='".$tpl_name."' and node_type='template'");
    if ($arr = $set->fetchRow()){
        $tpl_source = get_value($arr['id'],$thulit['lang']);
    return true;
    }else{
    return false;
    }
}
function db_get_timestamp($tpl_name, &$tpl_timestamp, &$smarty_obj){
    global $db;
    global $thulit;
    //$set = db_get("select * from data where name_id='".$tpl_name."' and node_type='template'");
    //if ($arr = $set->fetchRow()){
        $tpl_timestamp = time();
        //$tpl_timestamp = get_value_prop($arr['id'],$thulit['lang'],'date_mod');
    return true;
    //}else{
//  return false;
  //  }
}
function db_get_secure($tpl_name, &$smarty_obj){
    // assume all templates are secure
    return true;
}
function db_get_trusted($tpl_name, &$smarty_obj){
    // not used for templates
}
// register the resource name "db"
$smarty->register_resource("db", array("db_get_template", "db_get_timestamp", "db_get_secure", "db_get_trusted"));
?>