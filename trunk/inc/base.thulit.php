<?php

function load_properties($node,$obj){
    global $db;
    global $thulit;
    if (!isSet($node)){return false;}
    $set = db_get("select * from data left join relation on id=child_id where parent_id='".$node['id']."' and rel_type='property'");
    while ($arr = $set->fetchRow()){
        $obj->properties[$arr['node_name']]=get_value($arr['id'],$thulit['lang']);
    }
    $obj->properties['template']=$node['tpl_name'];
    $obj->properties['id']=$node['id'];
    //var_dump($node);
}
function get_value($id,$lang=null){
    global $db;
    global $thulit;
    if ( !isSet($lang) && isSet($thulit['lang']) ){$lang=$thulit['lang'];}
    if ( !isSet($lang) ){$lang=$thulit['default_lang'];}
    $set = db_get("select * from data left join relation on id=child_id where parent_id='".$id."' and (lang like '%".$lang."%' or lang='' or lang is null) order by sort_order");
    if ($arr = $set->fetchRow()){
        return $arr["data_".$arr['data_type']];
    }else{
	return null;
    }
}
function call_value($obj){
    $obj->_call_part('value');
}
function call_content($obj,$part){
    $obj->_call_part($part);
}
function get_value_prop($id,$lang=null,$col){
    global $db;
    global $thulit;
    if ( !isSet($lang) && isSet($thulit['lang']) ){$lang=$thulit['lang'];}
    if ( !isSet($lang) ){$lang=$thulit['default_lang'];}
    $set = db_get("select * from data left join relation on id=child_id where parent_id='".$id."' and (lang like '%".$lang."%' or lang='' or lang is null) order by sort_order");
    if ($arr = $set->fetchRow()){
        return $arr[$col];
    }else{
	return null;
    }
}
function get_children_by_rel_type($parent, $rel_type="display"){
    global $db;
    global $thulit;
    if (!isSet($parent)){return false;}
    $set = db_get("select * from data left join relation on id=child_id where parent_id='".$parent."' and rel_type='".$rel_type."' order by sort_order");
    while ($arr = $set->fetchRow()){
        $children[]=$arr;
    }
    return $children;
}
function display_root($page, $parent=null){
    global $db;
    global $thulit;
    if (!isSet($page)){$page=$thulit['default_page'];}
    $set = db_get("select * from data where name_id='".$page."' and node_type='page'");
    if ($arr = $set->fetchRow()){
        //Var_Dump::display($arr);
        display($arr, $parent);
    }
}
function display($node, $parent=null){
    global $thulit;
    require_once($thulit['modules_path'].$thulit['modules_prefix'].$node['node_type'].".php");
    eval("module_".$node['node_type']."::_display(\$node, \$parent);");
}
function print_tpl($obj){
    global $db;
    global $thulit;
    global $smarty;
    $smarty->assign('obj',$obj);
    $smarty->display("db:".$obj->properties['template']);

}

function db_get($q){
    global $db;
    if (!isSet($q)){return false;}
//    echo $q."<br />\n";
    $set = $db->query($q);
    if (DB::isError($set)) {
        die($set->getMessage());
    }
    return $set;
}

function db_get_template ($tpl_name, &$tpl_source, &$smarty_obj){
    global $db;
    global $thulit;
    $set = db_get("select * from data where name_id='".$tpl_name."' and node_type='template'");
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
    $set = db_get("select * from data where name_id='".$tpl_name."' and node_type='template'");
    if ($arr = $set->fetchRow()){
        $tpl_timestamp = time();
        //$tpl_timestamp = get_value_prop($arr['id'],$thulit['lang'],'date_mod');
	return true;
    }else{
	return false;
    }
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
