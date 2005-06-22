<?php

class ADMIN_NODE
{
	
	
    function add_node($edit_id, $node_type) {
        if(isSet($node_type)){
            $new_node['id']='0';
            $new_node['lang']='cz';
            $new_node['data_type']='text';
            $new_node['node_type']=$node_type;
            $new_node['tpl_name']='index.tpl';
            $new_node['owner']='0';
            $admin_data_write=new ADMIN_DATA_WRITE($new_node);
            $inserted=$admin_data_write->write(0, $edit_id);
            echo $admin_data_write->saved;
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
