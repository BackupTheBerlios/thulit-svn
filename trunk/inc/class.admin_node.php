<?php

class ADMIN_NODE
{
	
	
    function add_node($edit_id, $node_type) {
        if(isSet($node_type)){
            $new_node['id']='0';
            $new_node['lang']='';
            $new_node['data_type']='text';
            $new_node['node_type']=$node_type;
            $new_node['tpl_name']='';
            $new_node['owner']='0';
            $admin_data_write=new ADMIN_DATA_WRITE($new_node);
            $inserted=$admin_data_write->write(0, $edit_id);
            echo $admin_data_write->saved;
        }
        return null;
    }
    function delete_node($node_id){
        global $db;
        ADMIN_NODE::delete_links($node_id);
        $q="delete from data where id='".$node_id."'";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        return null;
    }
    function delete_links($node_id){
        global $db;
        $q="delete from relation where child_id='".$node_id."' or parent_id='".$node_id."'";
        echo $q;
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        return null;
    }
    function choose_to_add($parent) {
        global $smarty;
        global $modules;
        $smarty->assign("action",'add_node');
        $smarty->assign("node_types",$modules);
        $smarty->assign("parent",$parent);
        $smarty->display('admin_choose_node_type.tpl');
        return null;
    }
}

?>
