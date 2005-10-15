<?php
class DISPLAY_MENU{

    var $link;
    function DISPLAY_MENU($page, $menu=1){
        global $db;
        $q   = "select node_name, name_id from data left join relation on id=child_id where node_type='page' and parent_id='".$menu."' and rel_type='root_page'";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=0;
        while ($arr = $set->fetchRow()){
            $this->link[$i]['name']=$arr['node_name'];
            $this->link[$i]['href']="index.php?page=".$arr['name_id'];
            $this->link[$i]['xhref']="get_content.php?page=".$arr['name_id'];
            $i++;
        }
    }
    function vypis($item='0'){
        global $smarty;
        $smarty->assign('link', $this->link);
        $smarty->display('menu.tpl');
    }
}
?>


