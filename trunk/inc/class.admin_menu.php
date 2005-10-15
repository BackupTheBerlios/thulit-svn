<?php
class ADMIN_MENU{

    function menu($begin='0', $parent_arr=null){
        echo "Menu tree::<div class='menu'>";
        ADMIN_MENU::items($begin, $parent_arr);
        echo "</div>";
    }
    function items($begin, $parent_arr=null){
        global $db;
        $q = "select * from data left join relation on id=child_id where parent_id=".$begin." order by sort_order";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=1;
        $end_ul=false;
        while ($arr = $set->fetchRow()){
            if ($i++==1) {
                echo "\n<ul>";
                $end_ul=true;
            }
            echo "\n<li><a href='admin.php?action=edit_node&edit_id=".$arr['id']."'>".$arr['name_id']." : ".$arr['node_type']." : ".$arr['rel_type']."</a>";
            echo "\n - delete::<a href='admin.php?action=delete_node&node_id=".$arr['id']."'>node</a>";
            echo "\n::<a href='admin.php?action=delete_link&node_id=".$arr['id']."&parent_id=".$arr['parent_id'];
            echo "&rel_type=".$arr['rel_type']."&sort_order=".$arr['sort_order']."'>link</a>";
            if (!($arr['node_type']=='menu' && isSet($parent_arr) && $parent_arr['node_type']!='menu')){
                ADMIN_MENU::items($arr['id'], $arr);
            }
            echo "</li>";
        }
        if ($end_ul){echo "\n</ul>";}
    }
    function orphans($begin='0', $parent_arr=null){
        echo "Orphans::<div class='menu'>";
        ADMIN_MENU::orphans_item($begin, $parent_arr);
        echo "</div>";
    }
    function orphans_item($begin, $parent_arr=null){
        global $db;
	$q = "select * from data left join relation on id=child_id where child_id is null order by sort_order";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=1;
        $end_ul=false;
        while ($arr = $set->fetchRow()){
            if ($i++==1) {
                echo "\n<ul>";
                $end_ul=true;
            }
            echo "\n<li><a href='admin.php?action=edit_node&edit_id=".$arr['id']."'>".$arr['name_id']." : ".$arr['node_type']."</a>";
            echo "\n - delete::<a href='admin.php?action=delete_node&node_id=".$arr['id']."'>node</a>";
            if (!($arr['node_type']=='menu' && isSet($parent_arr) && $parent_arr['node_type']!='menu')){
                ADMIN_MENU::items($arr['id'], $arr);
            }
            echo "</li>";
        }
        if ($end_ul){echo "\n</ul>";}
    }
}
?>



