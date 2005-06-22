<?php
class DISPLAY_CONTENT{

    var $root;
    var $arr;
    function DISPLAY_CONTENT($page){
        global $db;
        $q   = "select * from data left join relation on id=parent_id where name_id='".$page."' and rel_type='display' order by sort_order";
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        $i=0;
        while($temp = $set->fetchRow()){
            $q   = "select * from data where id='".$temp['child_id']."'";
            $set2 = $db->query($q);
            $this->arr[$i++] = $set2->fetchRow();
        }
    }
    function vypis($item='0'){
        global $smarty;
        if ($this->arr){
            foreach($this->arr as $temp){
                $smarty->assign('content', $temp["data_".$temp['data_type']]);
                $smarty->display($temp['tpl_name']);
            }
        }
    }
}
?>



