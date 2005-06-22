<?php
class ADMIN_DATA_WRITE{

    var $root;
    var $arr;
    var $to_write;
    var $saved;
    function ADMIN_DATA_WRITE($input){
        $this->to_write=$input;
    }
    function write($edit_id, $parent_id='0'){
        if ($edit_id!='0'){
            $q = "update data set ";
            $q.= " name_id='".addslashes($this->to_write['name_id'])."'";
            if (isSet($this->to_write['owner'])){$q.= ", owner='".addslashes($this->to_write['owner'])."'";}
            if (isSet($this->to_write['data_type'])){$q.= ", data_type='".addslashes($this->to_write['data_type'])."'";}
            if (isSet($this->to_write['node_type'])){$q.= ", node_type='".addslashes($this->to_write['node_type'])."'";}
            if (isSet($this->to_write['node_name'])){$q.= ", node_name='".addslashes($this->to_write['node_name'])."'";}
            if (isSet($this->to_write['lang'])){$q.= ", lang='".addslashes($this->to_write['lang'])."'";}
            if (isSet($this->to_write['tpl_name'])){$q.= ", tpl_name='".addslashes($this->to_write['tpl_name'])."'";}
            if (isSet($this->to_write['data_text'])){$q.= ", data_text='".$this->to_write['data_text']."'";}
            //if (isSet($this->to_write['data_text'])){$q.= ", data_text='".addslashes($this->to_write['data_text'])."'";}
            if (isSet($this->to_write['data_varchar'])){$q.= ", data_varchar='".addslashes($this->to_write['data_varchar'])."'";}
            if (isSet($this->to_write['data_datetime'])){$q.= ", data_datetime='".addslashes($this->to_write['data_datetime'])."'";}
            if (isSet($this->to_write['data_date'])){$q.= ", data_date='".addslashes($this->to_write['data_date'])."'";}
            if (isSet($this->to_write['data_time'])){$q.= ", data_time='".addslashes($this->to_write['data_time'])."'";}
            if (isSet($this->to_write['data_int'])){$q.= ", data_int='".addslashes($this->to_write['data_int'])."'";}
            $q.= ", date_mod=now()";
            $q.= " where id='".$edit_id."'";
            $this->query($q);
            $this->saved='<div id="saved">Saved</div>';
            $ret=true;
        }else{
            $timestamp=time();
            $q = "insert into data set ";
            $q.= " name_id=$timestamp";
            $q.= ", owner='".addslashes($this->to_write['owner'])."'";
            $q.= ", data_type='".addslashes($this->to_write['data_type'])."'";
            $q.= ", node_type='".addslashes($this->to_write['node_type'])."'";
            $q.= ", lang='".addslashes($this->to_write['lang'])."'";
            $q.= ", tpl_name='".addslashes($this->to_write['tpl_name'])."'";
            $q.= ", date_mod=now()";
            $q.= ", date_create=now()";
            $this->query($q);
            $this->saved='<div id="saved">Saved</div>';
            $q = "select id from data where name_id='$timestamp'";
            $set=$this->query($q);
            if ($arr = $set->fetchRow()){
                $ret=$arr['id'];
                $this->relation_add($arr['id'], $parent_id);
            }else{
                $ret=false;
            }
        }
        return $ret;
    }
    function query($q){
        global $db;
        $set = $db->query($q);
        if (DB::isError($set)) {
            die($set->getMessage());
        }
        return $set;
    }
    function relation_add($child_id, $parent_id, $rel_type='display'){
            $q="select * from relation where parent_id='".$parent_id."' order by sort_order";
            $set = $this->query($q);
            if (DB::isError($set)) {
                die($set->getMessage());
            }
            $i=-1;
            while ($arr = $set->fetchRow()){$i=$arr['sort_order'];}
            $q="insert into relation set parent_id='".$parent_id."', child_id='".$child_id."', sort_order='".++$i."', rel_type='".$rel_type."'";
            $set = $this->query($q);
            if (DB::isError($set)) {
                die($set->getMessage());
            }
    }
}
?>



