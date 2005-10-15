<?php
function get_user(){
    global $a;
    if ($a->checkAuth()){
    $set=db_get("select * from auth where username='".$a->getUsername()."'");
    if ($arr = $set->fetchRow()){
        $arr['PASSWORD']=null;
        return $arr;
    }else{
        die("WTF! User ".$a->getUsername()." does not exist ?!?");
    }
    }else{
    $arr['id']=-1;
    $arr['username']=null;
    $arr['user_node']=null;
    $arr['user_level']=99;
    return $arr;
    }
}
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
    $obj->properties['name_id']=$node['name_id'];
    $obj->properties['node_type']=$node['node_type'];
    $obj->properties['node_name']=$node['node_name'];
    $obj->properties['class']=$node['class'];
    $obj->properties['lang']=$node['lang'];
    $obj->properties['view_level']=$node['view_level'];
    $obj->properties['edit_level']=$node['edit_level'];
}
function load_node_properties($node,$obj){
    global $db;
    global $thulit;
    if (!isSet($node)){return false;}
    $obj->properties['template']=$node['tpl_name'];
    $obj->properties['id']=$node['id'];
    $obj->properties['name_id']=$node['name_id'];
    $obj->properties['node_type']=$node['node_type'];
    $obj->properties['node_name']=$node['node_name'];
    $obj->properties['class']=$node['class'];
    $obj->properties['lang']=$node['lang'];
    $obj->properties['view_level']=$node['view_level'];
    $obj->properties['edit_level']=$node['edit_level'];
}
function get_value($id,$lang=null){
    global $db;
    global $thulit;
    if ( !isSet($lang) && isSet($thulit['lang']) ){$lang=$thulit['lang'];}
    if ( !isSet($lang) ){$lang=$thulit['default_lang'];}
    $set = db_get("select * from data left join relation on id=child_id where parent_id='".$id."' and (lang like '%".$lang."%' or lang='' or lang is null) order by sort_order");
    if ($arr = $set->fetchRow()){
        return stripslashes($arr["data_".$arr['data_type']]);
    }else{
    return null;
    }
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
function get_children_by_id($id){
    global $db;
    global $thulit;
    if (!isSet($id)||$id==0||$id==''){return false;}
    $set = db_get("select * from data where id = '".$id."'");
    if ($arr = $set->fetchRow()){
        return $arr;
    }else{
    return false;
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
function save_edit(){
    global $thulit;
    require_once($thulit['modules_path'].$thulit['modules_prefix'].$_POST['node_type'].".php");
    eval("module_".$_POST['node_type']."::_save(\$_POST['node_id']);");

}
function display_root($page, $parent=null){
    global $db;
    global $thulit;
    if (!isSet($page)){$page=$thulit['default_page'];}
    $set = db_get("select * from data where name_id='".$page."' and node_type='page' or node_type='edit'");
    if ($arr = $set->fetchRow()){
        display($arr, $parent);
    }
}
function display_site($site, $parent=null){
    global $db;
    global $thulit;
    if (!IsSet($site)){
        die("??? \$site nie je definovane ???");
    }
    $set = db_get("select * from data where name_id='".$site."' and node_type='site'");
    if ($arr = $set->fetchRow()){
        display($arr, $parent);
    }
}
function display($node, $parent=null){
    global $thulit;
    require_once($thulit['modules_path'].$thulit['modules_prefix'].$node['node_type'].".php");
    eval("module_".$node['node_type']."::_display(\$node, \$parent, null);");
}
function print_tpl($obj){
    global $db;
    global $thulit;
    global $smarty;
    $smarty->assign('obj',$obj);
    $smarty->assign('prop',$obj->properties);
    if ($obj->parent!=null){$smarty->assign('parent_prop',$obj->parent->properties);}else{$smarty->assign('parent_prop',$obj->parent);}
    $smarty->display("db:".$obj->properties['template']);
}


function db_get($q){
    global $db;
    if (!isSet($q)){return false;}
    //echo $q."<br />\n";
    $set = $db->query($q);
    if (DB::isError($set)) {
        die($set->getMessage());
    }
    return $set;
}




?>
