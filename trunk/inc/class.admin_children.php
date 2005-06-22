<?php
class ADMIN_CHILDREN{

    var $parent_id;
    var $parent_types=array('content');
    var $link;
    function ADMIN_CHILDREN($parent_id){
        $this->parent_id=$parent_id;
    }
    function create(){
        global $db;
        $q   = "select distinct rel_type from data left join relation on id=parent_id where parent_id='".$this->parent_id."'";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=0;
        while ($arr = $set->fetchRow()){
            $this->link[$i]=$arr['rel_type'];
    	    $i++;
        }
    }
    function display($item='0'){
        global $smarty;
        $smarty->assign('link', $this->link);
        $smarty->assign('parent', $this->parent_id);
        $smarty->register_object("admin_children",$this);
        $smarty->display('admin_children.tpl');
    }
    function items($type){
        global $db;
        global $smarty;
        $q   = "select * from data left join relation on id=child_id where rel_type='".$type['p1']."' and parent_id='".$this->parent_id."'";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=0;
        $this->link2=null;
        while ($arr = $set->fetchRow()){
            if (isSet($arr['node_name'])){$this->link2[$i]['name']=$arr['node_name'];}
            if (isSet($arr['name_id'])){$this->link2[$i]['name_id']=$arr['name_id'];}
	        if (isSet($arr['id'])){$this->link2[$i]['href']="admin.php?node_id=".$arr['id'];}
            $i++;
        }
        $smarty->assign('link2', $this->link2);
        $smarty->display('admin_children_items.tpl');
    }
    
    
    
    
    
    
    function add_child($node_id) {
        global $db;
        if (isSet($_POST['added_children'])){ $added_children = $_POST['added_children']; }else{ $added_children = ''; }
        if (isSet($_POST['added_rel_type'])){ $added_rel_type = $_POST['added_rel_type']; }else{ $added_rel_type = 'display'; }
        $q="select * from relation where parent_id='".$node_id."' order by sort_order";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=-1;
        while ($arr = $set->fetchRow()){$i=$arr['sort_order'];}
        if (isSet($added_children) && $added_children!=''){
            foreach($added_children as $ch_id){
                $q="insert into relation set parent_id='".$node_id."', child_id='".$ch_id."', sort_order='".++$i."', rel_type='".$added_rel_type."'";
                $set = $db->query($q);
                if (DB::isError($set)) {
                    die($set->getMessage());
                }
            }
        }
        return null;
    }
    
    
    function choose($parent) {
        global $smarty;
        ADMIN_CHILDREN::adopted_childs($parent);
        $node_types=ADMIN_CHILDREN::get_node_types();
        $smarty->assign("action",'add_child');
        $smarty->assign("node_types",$node_types);
        $smarty->assign("parent",$parent);
        $smarty->display('admin_choose_node_type.tpl');
        if (isSet($_GET['node_type'])&&($_GET['node_type']!='')){
            ADMIN_CHILDREN::create_form($parent, $_GET['node_type']);
        }
        return null;
    }
    function create_form($parent, $node_type){
        global $smarty;
        global $relation_types;
        $nodes = ADMIN_CHILDREN::get_nodes_by_type($parent, $node_type);
        $smarty->assign("nodes",$nodes);
        $smarty->assign("parent",$parent);
        $rel_types=$relation_types;
        $smarty->assign("rel_types",$rel_types);
        $smarty->display('admin_choose_node_form.tpl');
            
    }
    function adopted_childs($parent) {
        global $smarty;
        $rel_types = ADMIN_CHILDREN::get_rel_types($parent);
        $childs_arr = ADMIN_CHILDREN::get_children_data($parent, $rel_types);
        $smarty->assign("childs_arr",$childs_arr);
        $smarty->assign("parent",$parent);
        $smarty->display('admin_add_children.tpl');
    }
    function get_nodes_by_type($parent, $node_type){
        global $db;
        $q="select * from data left join relation on id = child_id and parent_id='".$parent."' where child_id IS NULL and node_type='".$node_type."' order by name_id";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=1;
        while ($arr = $set->fetchRow()){
            $nodes[$i++]=$arr;
        }
        if (isSet($nodes)){
            return $nodes;
        }else{
            return null;
        }
    }
    function get_node_types(){
        global $db;
        $q="select distinct node_type from data order by node_type";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=1;
        while ($arr = $set->fetchRow()){
            $node_types[$i++]=$arr['node_type'];
        }
        if (isSet($node_types)){
            return $node_types;
        }else{
            return null;
        }
    }
    function get_children_data($parent, $rel_types){
            global $db;
    if (isSet($rel_types)){
        foreach ($rel_types as $rel){
            $q="select * from data left join relation on id=child_id where parent_id='".$parent."' and rel_type='".$rel."' order by sort_order";
            $set = $db->query($q);
            if (DB::isError($set)) {
                die($set->getMessage());
            }
            $i=1;
            while ($arr = $set->fetchRow()){
                $childs_arr[$rel][$i++]=$arr;
            }
        }
    }
        if (isSet($childs_arr)){
            return $childs_arr;
        }else{
            return null;
        }
    }
    function get_rel_types($parent){
        global $db;
        $q="select rel_type from data left join relation on id=child_id where parent_id='".$parent."' order by rel_type";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=1;
        while ($arr = $set->fetchRow()){
            $rel_types[$i++]=$arr['rel_type'];
        }
        if (isSet($rel_types)){
            return $rel_types;
        }else{
            return null;
        }
    }

    function get_children_in_rel_type($parent_id, $rel_type){
        global $db;
        $q="select * from relation where parent_id='".$parent_id."' and rel_type='".$rel_type."' order by sort_order";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        if (isSet($set)){
            return $set;
        }else{
            return null;
        }
    }
    function resort_relation($parent_id, $rel_type){
        global $db;
        $children=ADMIN_CHILDREN::get_children_in_rel_type($parent_id, $rel_type);
        $i=0;
        while ($arr = $children->fetchRow()){
            if($i!=$arr['sort_order']){
                $q="update relation set sort_order='".$i."' where parent_id='".$arr['parent_id']."' and child_id='".$arr['child_id']."' and rel_type='".$arr['rel_type']."' and sort_order='".$arr['sort_order']."'";
                echo $q."<br />";
                $set = $db->query($q);
                if (DB::isError($set)) {
                    die($set->getMessage());
                }
            }
            $i++;
        }
    }

    function delete_link($parent_id, $child_id, $rel_type, $sort_order){
        global $db;
        $q="delete from relation where parent_id='".$parent_id."' and child_id='".$child_id."' and rel_type='".$rel_type."' and sort_order='".$sort_order."'";
        echo $q."<br />";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        ADMIN_CHILDREN::resort_relation($parent_id, $rel_type);
    }	

}
?>



